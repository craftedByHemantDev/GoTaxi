<?php

namespace App\OTP\Generators;

class OTPGenerator
{
    public function generate(): string
    {
        return (string) random_int(100000, 999999);
    }
}
