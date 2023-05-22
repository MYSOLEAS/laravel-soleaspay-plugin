<?php

namespace Mysoleas\PackageSopay;

use Illuminate\Support\Facades\Http;


class PackageSopay
{
    public function processPayment( $service, $wallet, $amount, $currency, $orderId)
    {
        $services = [
            'orange_money' => 2,
            'mtn_mobile_money' => 1,
            'bitcoin' => 3,
            'paypal' => 7,
            'express_union' => 5,
            'perfect_money' => 8,
            'litecoin' => 10,
            'dogecoin' => 11
        ];
        $operation=2;
            $response = Http::withHeaders([
                'x-api-key' => config('package-sopay.x-api-key'),
                'service' => $services[$service],
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