<?php

namespace App\Services;

use FedaPay\FedaPay;
use FedaPay\Transaction;

class FedaPayService
{
    public function __construct()
    {
       
       \FedaPay\FedaPay::setApiKey(config('services.fedapay.secret')); 
\FedaPay\FedaPay::setEnvironment(config('services.fedapay.env')); // sandbox ou live

    }

    public function createTransaction($amount, $currency, $customerEmail)
    {
        return Transaction::create([
            'amount' => $amount,
            'currency' => ['iso' => $currency],
            'customer' => [
               'email' => $customerEmail
            ],
            'callback_url' => route('payment.callback'),
        ]);
    }
}


