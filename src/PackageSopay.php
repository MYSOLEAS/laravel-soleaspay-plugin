<?php

namespace Mysoleas\PackageSopay;

use Illuminate\Support\Facades\Http;


class PackageSopay
{
    public function processPayment( $service, $operation, $wallet, $amount, $currency, $orderId)
    {
        $response = Http::withHeaders([
            'x-api-key' => config('package-sopay.x-api-key'),
            'service' => $service,
            'operation' => $operation,
        ])->post('https://soleaspay.com/api/agent/sandbox', [
            'wallet' => $wallet,
            'amount' => $amount,
            'currency' => $currency,
            'order_id' => $orderId,
        ]);

        $jsonResponse = json_decode($response->body(), true);

        return $jsonResponse;
    }

}
