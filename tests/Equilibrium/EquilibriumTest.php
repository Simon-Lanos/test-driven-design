<?php declare(strict_types=1);

namespace Equilibrium;

use App\Equilibrium;
use PHPUnit\Framework\TestCase;

final class EquilibriumTest extends TestCase
{
    public function testIsInEquilibrium(): void
    {
        $this->assertTrue(Equilibrium::isInEquilibrium(''));
        $this->assertTrue(Equilibrium::isInEquilibrium('()'));
        $this->assertTrue(Equilibrium::isInEquilibrium('(foo(bar))'));
        $this->assertTrue(Equilibrium::isInEquilibrium('foo'));
    }

    public function testIsNotInEquilibrium(): void
    {
        $this->assertFalse(Equilibrium::isInEquilibrium('((foo)'));
        $this->assertFalse(Equilibrium::isInEquilibrium(')(()'));
    }
}
