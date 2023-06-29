<?php declare(strict_types=1);

namespace tests\Unit\FooBarQixTests;

use App\FooBarQix;
use PHPUnit\Framework\TestCase;

class FooBarQixCombinedTest extends TestCase
{
    private FooBarQix $fooBarQix;

    protected function setUp(): void
    {
        parent::setUp();
        $this->fooBarQix = new FooBarQix();
    }

    public function test_number_contains_multiple_digits_with_multiples_and_occurrences(): void
    {
        $this->assertSame('Foo, Bar, Bar', $this->fooBarQix->combined(15));
        $this->assertSame('Foo, Bar, Qix, Bar', $this->fooBarQix->combined(105));
        $this->assertSame('Foo, Qix, Foo, Bar, Qix', $this->fooBarQix->combined(357));
        $this->assertSame('53, Bar, Foo', $this->fooBarQix->combined(53));
        $this->assertSame('Foo, Bar, Qix', $this->fooBarQix->combined(57));
        $this->assertSame('Bar, Qix, Foo, Bar', $this->fooBarQix->combined(35));
        $this->assertSame('37, Foo, Qix', $this->fooBarQix->combined(37));
        $this->assertSame('Foo, Qix, Bar, Foo', $this->fooBarQix->combined(753));
        $this->assertSame('Qix, Bar, Qix', $this->fooBarQix->combined(1057));
        $this->assertSame('Foo, Bar, Qix, Foo', $this->fooBarQix->combined(573));
        $this->assertSame('Foo, Foo', $this->fooBarQix->combined(3));
        $this->assertSame('Bar, Bar', $this->fooBarQix->combined(5));
        $this->assertSame('Qix, Qix', $this->fooBarQix->combined(7));
    }
}
