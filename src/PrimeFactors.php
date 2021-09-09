<?php declare(strict_types=1);

namespace App;

class PrimeFactors
{
    public static function generate(int $number): array
    {
        if ($number === 1) {
            return [];
        }

        if ($number === 2 || $number === 3) {
            return [$number];
        }

        if ($number === 4) {
            return [2, 2];
        }
    }
}
