<?php declare(strict_types=1);

namespace PrimeFactor;

use App\PrimeFactors;
use PHPUnit\Framework\TestCase;

final class PrimeFactorsTest extends TestCase
{
    public function testOne()
    {
        $this->assertEquals([], PrimeFactors::generate(1), "1 n'a pas de facteur premier");
    }

    public function testTwo()
    {
        $this->assertEquals([2], PrimeFactors::generate(2), "2 a un seul facteur premier");
    }

    public function testThree()
    {
        $this->assertEquals([3], PrimeFactors::generate(3), "3 a un seul facteur premier");
    }

    public function testFour()
    {
        $this->assertEquals([2, 2], PrimeFactors::generate(4), "4 a 2 facteurs premiers");
    }
}
