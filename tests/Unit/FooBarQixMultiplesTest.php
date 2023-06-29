<?php declare(strict_types=1);

use App\FooBarQix;
use PHPUnit\Framework\TestCase;

class FooBarQixMultiplesTest extends TestCase
{
    private FooBarQix $fooBarQix;

    protected function setUp(): void
    {
        parent::setUp();
        $this->fooBarQix = new FooBarQix();
    }

    public function test_positive_integer_input(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Number must be a positive integer.');

        $this->fooBarQix->multiple(0);
        $this->fooBarQix->multiple(-10);
        $this->fooBarQix->multiple('abc');
        $this->fooBarQix->multiple('1a');
        $this->fooBarQix->multiple('12.34');
        $this->fooBarQix->multiple('!@#$');
    }

    public function test_number_is_multiple_of_three(): void
    {
        $this->assertSame('Foo', $this->fooBarQix->multiple(3));
        $this->assertSame('Foo', $this->fooBarQix->multiple(9));
        $this->assertSame('Foo', $this->fooBarQix->multiple(12));
    }

    public function test_number_is_multiple_of_five(): void
    {
        $this->assertSame('Bar', $this->fooBarQix->multiple(5));
        $this->assertSame('Bar', $this->fooBarQix->multiple(10));
        $this->assertSame('Bar', $this->fooBarQix->multiple(50));
    }

    public function test_number_is_multiple_of_seven(): void
    {
        $this->assertSame('Qix', $this->fooBarQix->multiple(7));
        $this->assertSame('Qix', $this->fooBarQix->multiple(14));
        $this->assertSame('Qix', $this->fooBarQix->multiple(28));
    }

    public function test_number_is_multiple_of_several_numbers(): void
    {
        $this->assertSame('Foo, Bar', $this->fooBarQix->multiple(15));
        $this->assertSame('Foo, Qix', $this->fooBarQix->multiple(21));
        $this->assertSame('Bar, Qix', $this->fooBarQix->multiple(35));
        $this->assertSame('Foo, Bar, Qix', $this->fooBarQix->multiple(105));
    }

    public function test_number_with_no_multiples_returns_number_as_string(): void
    {
        $this->assertSame('2', $this->fooBarQix->multiple(2));
        $this->assertSame('4', $this->fooBarQix->multiple(4));
        $this->assertSame('22', $this->fooBarQix->multiple(22));
    }
}
