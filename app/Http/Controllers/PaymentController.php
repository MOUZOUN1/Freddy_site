<?php

namespace App\Http\Controllers;

use App\Services\FedaPayService;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    protected $fedaPay;

    public function __construct(FedaPayService $fedaPay)
    {
        $this->fedaPay = $fedaPay;
    }

    // Affiche la page de paiement pour un patrimoine
    public function showForm($heritage_id)
    {
        // Exemple de données statiques pour remplacer le modèle
        $heritage = [
            'id' => $heritage_id,
            'title' => 'Exemple Patrimoine #' . $heritage_id,
            'price' => 1000, // montant en XOF
        ];

        return view('payment.form', compact('heritage'));
    }

    // Traite le paiement
    public function processPayment(Request $request)
    {
        $request->validate([
            'heritage_id' => 'required|integer',
            'amount' => 'required|numeric',
            'email' => 'required|email',
            'card_number' => 'required|string',
            'card_exp_month' => 'required|string',
            'card_exp_year' => 'required|string',
            'card_cvc' => 'required|string',
        ]);

        $transaction = $this->fedaPay->createTransactionWithCard(
            $request->amount,
            'XOF',
            $request->email,
            [
                'number' => $request->card_number,
                'exp_month' => $request->card_exp_month,
                'exp_year' => $request->card_exp_year,
                'cvc' => $request->card_cvc,
            ]
        );

        return redirect()->route('payment.callback')->with('transaction_id', $transaction->id);
    }

    public function callback(Request $request)
    {
        $transactionId = session('transaction_id');
        return view('payment.success', compact('transactionId'));
    }
}
