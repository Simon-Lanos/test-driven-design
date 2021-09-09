<?php declare(strict_types=1);

namespace Years;

use App\Years;
use PHPUnit\Framework\TestCase;

final class YearsTest extends TestCase
{
    public function testIsLeap(): void
    {
        $this->assertTrue(Years::isLeap(2000));
    }

    public function testIsNotLeap(): void
    {
        $this->assertFalse(Years::isLeap(2003));
    }
}
