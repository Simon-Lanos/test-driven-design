<?php declare(strict_types=1);

namespace App;

class Years
{
    public static function isLeap(int $year): bool
    {
        return $year % 4 === 0 || $year % 400 === 0;
    }
}
