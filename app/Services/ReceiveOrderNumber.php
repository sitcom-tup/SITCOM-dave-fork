<?php

namespace App\Services;

use Illuminate\Support\Str;

class ReceiveOrderNumber
{

    public function generateOrderNumber()
    {
        return (string) Str::uuid();
    }

    public function confirmationNumber()
    {
        return bin2hex(random_bytes(24));
    }

}