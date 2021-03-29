<?php

namespace App\Tests\Unit;

use PHPUnit\Framework\TestCase;

class CheckingTestsTest extends TestCase
{
    public function testsAreWorking1(): void
    {
        $this->assertTrue(true);
    }

    public function testsAreWorking2(): void
    {
        $this->assertFalse(true);
    }
}
