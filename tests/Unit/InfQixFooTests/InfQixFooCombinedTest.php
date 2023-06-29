<?php declare(strict_types=1);

namespace tests\Unit\FooBarQixTests;

use App\InfQixFoo;
use PHPUnit\Framework\TestCase;

class InfQixFooCombinedTest extends TestCase
{
    private InfQixFoo $infQixFoo;

    protected function setUp(): void
    {
        parent::setUp();
        $this->infQixFoo = new InfQixFoo();
    }

    public function test_number_contains_multiple_digits_with_multiples_and_occurrences(): void
    {
        $this->assertSame('Inf; Foo', $this->infQixFoo->combined(24));
        $this->assertSame('Inf; Qix; Foo; Inf', $this->infQixFoo->combined(168));
        $this->assertSame('Qix; Foo; Foo; Qix; Inf', $this->infQixFoo->combined(378));
        $this->assertSame('83; Inf; Foo', $this->infQixFoo->combined(83));
        $this->assertSame('Foo; Inf; Qix', $this->infQixFoo->combined(87));
        $this->assertSame('73; Qix; Foo', $this->infQixFoo->combined(73));
        $this->assertSame('37; Foo; Qix', $this->infQixFoo->combined(37));
        $this->assertSame('Qix; Foo; Foo; Qix; Inf', $this->infQixFoo->combined(378));
        $this->assertSame('1037; Foo; Qix', $this->infQixFoo->combined(1037));
        $this->assertSame('Foo; Inf; Qix; Foo', $this->infQixFoo->combined(873));
        $this->assertSame('Inf; Inf', $this->infQixFoo->combined(8));
        $this->assertSame('Qix; Qix', $this->infQixFoo->combined(7));
        $this->assertSame('Foo; Foo', $this->infQixFoo->combined(3));
    }
}
