<?php declare(strict_types=1);

namespace App;

class PrimeFactors
{
    // https://www.fusionswift.com/2010/06/php-prime-factors/
    public static function generate(int $number): array
    {
        if ($number === 1) {
            return [];
        }

        $sqrt = sqrt($number);
        for ($i = 2; $i <= $sqrt; $i++) {
            if ($number % $i === 0) {
                $return = array_merge(self::generate($number/$i), array($i));
                sort($return, SORT_REGULAR);
                return $return;
            }
        }
        return [$number];
    }
}
