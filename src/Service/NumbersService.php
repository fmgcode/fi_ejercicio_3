<?php

declare(strict_types=1);

namespace App\Service;

use Exception;

class NumbersService
{
    public function addNumbers(float $firstValue, float $secondValue): float
    {
        return $firstValue + $secondValue;
    }

    public function divideNumbers(float $firstValue, float $secondValue): float
    {
        if($secondValue == 0) {
            throw new Exception("cannot divide by zero");
        }

        return $firstValue / $secondValue;
    }
}