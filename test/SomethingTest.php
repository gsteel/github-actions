<?php
declare(strict_types=1);

namespace App\Test;

use App\Something;
use PHPUnit\Framework\TestCase;

class SomethingTest extends TestCase
{
    public function testSomething() : void
    {
        $something = new Something(10);
        $this->assertSame(10, $something->something());
    }

    public function testSomethingElse() : void
    {
        $something = new Something(10);
        $this->assertSame(100, $something->somethingElse());
    }
}
