<?php declare(strict_types=1);

namespace App;

class Equilibrium
{
    public static function isInEquilibrium(string $string): bool
    {
        $count = 0;

        foreach (str_split($string) as $character) {
            if ($character === '(' && $count >= 0) {
                $count++;
            }

            if ($character === ')') {
                $count--;
            }
        }

        return $count === 0;
    }
}
