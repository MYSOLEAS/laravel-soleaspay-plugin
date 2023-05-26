<?php

namespace Mysoleas\PackageSopay;

use Illuminate\Support\Facades\Http;

class PackageSopay
{
    public function processPayment($service, $wallet, $amount, $currency, $orderId)
    {
        $services = [
            'orange_money_CM' => 2,
            'mtn_mobile_money_CM' => 1,
            'bitcoin' => 3,
            'paypal' => 7,
            'express_union' => 5,
            'perfect_money' => 8,
            'litecoin' => 10,
            'dogecoin' => 11,
        ];
        $operation = 2;
        $response = Http::withHeaders([
            'x-api-key' => config('package-sopay.x-api-key'),
            'service' => $services[$service],
            'operation' => $operation,
        ])->post('https://soleaspay.com/api/agent/bills', [
            'wallet' => $wallet,
            'amount' => $amount,
            'currency' => $currency,
            'order_id' => $orderId,
        ]);
        $jsonResponse = json_decode($response->body(), true);

        return $jsonResponse;
    }

    public function getLink($mode, $instance, $amount, $currency, $langue, $description, $shopName)
    {
        $apikey = config('package-sopay.x-api-key');
        $links = [];
        $codeData = [];
        $modes = [
            'billing' => 'b',
            'tiping' => 't',
        ];

        for ($i = 0; $i < $instance; $i++) {
            $length = 10;
            $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $ref = substr(str_shuffle($chars), 0, $length);
            array_push($links, 'https://soleaspay.com/m/' . $ref . '');
            $url = 'https://soleaspay.com/qr/pay/sb.html?l=' . base64_encode($langue) . '&a=' . base64_encode($amount) . '&d=' . base64_encode($description) . '&m=' . base64_encode($modes[$mode]) . '&c=' . base64_encode($currency) . '&k=' . base64_encode($apikey) . '&s=' . base64_encode($shopName) . '&q=' . base64_encode($ref) . '';
            array_push($codeData, ['ref' => $ref, 'link' => $url, 'type' => $modes[$mode]]);
        }

        $response = Http::withHeaders([
            'x-api-key' => config('package-sopay.x-api-key'),
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ])->post('https://soleaspay.com/api/agent/qr/add', [
            'data' => $codeData,
        ]);
        $jsonResponse = json_decode($response->body(), true);
        return $links;
    }
}
