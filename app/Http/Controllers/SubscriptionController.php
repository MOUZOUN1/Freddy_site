<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use App\Models\Payment;
use Illuminate\Http\Request;
use Carbon\Carbon;
use FedaPay\FedaPay;
use FedaPay\Transaction;

class SubscriptionController extends Controller
{
    public function __construct()
    {
        // Configuration FedaPay
        FedaPay::setApiKey(config('services.fedapay.secret_key'));
        FedaPay::setEnvironment(config('services.fedapay.environment'));
    }

    public function plans()
    {
        $plans = [
            'mensuel' => [
                'name' => 'Abonnement Mensuel',
                'price' => 2000, // 2000 XOF
                'duration' => 'mois',
                'features' => [
                    'Accès illimité à tous les contenus',
                    'Téléchargement des médias',
                    'Pas de publicité',
                    'Support prioritaire'
                ]
            ],
            'annuel' => [
                'name' => 'Abonnement Annuel',
                'price' => 20000, // 20000 XOF (économie de 2 mois)
                'duration' => 'an',
                'features' => [
                    'Tous les avantages du mensuel',
                    '2 mois gratuits',
                    'Badge membre premium',
                    'Accès anticipé aux nouveaux contenus'
                ]
            ]
        ];

        return view('subscription.plans', compact('plans'));
    }

    public function subscribe(Request $request)
    {
        $request->validate([
            'plan' => 'required|in:mensuel,annuel',
        ]);

        $user = auth()->user();
        $plan = $request->plan;
        
        // Définir le montant et la durée
        $amount = $plan === 'mensuel' ? 2000 : 20000;
        $duration = $plan === 'mensuel' ? 1 : 12;

        try {
            // Créer une transaction FedaPay
            $transaction = Transaction::create([
                'description' => "Abonnement {$plan} - Culture Bénin",
                'amount' => $amount,
                'currency' => ['iso' => 'XOF'],
                'callback_url' => route('subscription.callback'),
                'customer' => [
                    'firstname' => $user->name,
                    'lastname' => '',
                    'email' => $user->email,
                ]
            ]);

            // Générer le token de paiement
            $token = $transaction->generateToken();

            // Créer un enregistrement de paiement en attente
            Payment::create([
                'user_id' => $user->id,
                'transaction_id' => $transaction->id,
                'amount' => $amount,
                'currency' => 'XOF',
                'payment_method' => 'fedapay',
                'status' => 'pending',
                'fedapay_response' => json_encode($transaction->toArray())
            ]);

            // Stocker les infos dans la session
            session([
                'pending_subscription' => [
                    'plan' => $plan,
                    'transaction_id' => $transaction->id,
                    'amount' => $amount,
                    'duration' => $duration
                ]
            ]);

            // Rediriger vers la page de paiement FedaPay
            return redirect($token->url);

        } catch (\Exception $e) {
            return back()->with('error', 'Erreur lors de l\'initialisation du paiement: ' . $e->getMessage());
        }
    }

    public function callback(Request $request)
    {
        $transactionId = $request->query('id');
        
        if (!$transactionId) {
            return redirect()->route('subscription.plans')
                           ->with('error', 'Transaction invalide.');
        }

        try {
            // Récupérer la transaction depuis FedaPay
            $transaction = Transaction::retrieve($transactionId);
            
            // Vérifier si le paiement est approuvé
            if ($transaction->status === 'approved') {
                $user = auth()->user();
                $pendingData = session('pending_subscription');

                // Mettre à jour le paiement
                $payment = Payment::where('transaction_id', $transactionId)->first();
                if ($payment) {
                    $payment->status = 'completed';
                    $payment->save();
                }

                // Créer l'abonnement
                $startsAt = Carbon::now();
                $endsAt = $pendingData['plan'] === 'mensuel' 
                    ? $startsAt->copy()->addMonth() 
                    : $startsAt->copy()->addYear();

                $subscription = Subscription::create([
                    'user_id' => $user->id,
                    'type' => $pendingData['plan'],
                    'amount' => $pendingData['amount'],
                    'starts_at' => $startsAt,
                    'ends_at' => $endsAt,
                    'status' => 'active',
                    'payment_reference' => $transactionId
                ]);

                // Mettre à jour l'utilisateur
                $user->is_subscribed = true;
                $user->subscription_ends_at = $endsAt;
                $user->subscription_type = $pendingData['plan'];
                $user->save();

                // Nettoyer la session
                session()->forget('pending_subscription');

                return redirect()->route('home')
                               ->with('success', 'Abonnement activé avec succès ! Profitez de tous nos contenus.');
            } else {
                return redirect()->route('subscription.plans')
                               ->with('error', 'Le paiement n\'a pas été approuvé.');
            }

        } catch (\Exception $e) {
            return redirect()->route('subscription.plans')
                           ->with('error', 'Erreur lors de la vérification du paiement: ' . $e->getMessage());
        }
    }

    public function cancel()
    {
        $user = auth()->user();
        $subscription = $user->activeSubscription();

        if ($subscription) {
            $subscription->status = 'cancelled';
            $subscription->save();

            $user->is_subscribed = false;
            $user->save();

            return back()->with('success', 'Votre abonnement a été annulé.');
        }

        return back()->with('error', 'Aucun abonnement actif trouvé.');
    }
}