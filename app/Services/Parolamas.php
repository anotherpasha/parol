<?php

namespace App\Services;

class Parolamas
{
    public function getBilling($policyNumber)
    {
        // get data from API
        $ididan = strtotime('now');
        return [
            'order_id' => $ididan,
            'bill_id' => $ididan,
            'name' => 'Testing Account',
            'email' => 'test@parolamas.com',
            'phone' => '081808180818',
            'description' => 'Testing Description',
            'amount' => 1400000
        ];
    }
}
