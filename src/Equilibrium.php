<?php declare(strict_types=1);

namespace App;

class Equilibrium
{
    public static function isInEquilibrium(string $string): bool
    {
        $count = 0;

        foreach (str_split($string) as $character) {
            if ($character === '(') {
                $count++;
            }

            if ($character === ')') {
                $count--;
            }

            if ($count === -1) {
                return false;
            }
        }

        return $count === 0;
    }
}
