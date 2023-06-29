<?php declare(strict_types=1);

namespace tests\Unit\InfQixFooTests;

use App\InfQixFoo;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class InfQixFooMultiplesTest extends TestCase
{
    private InfQixFoo $infQixFoo;

    protected function setUp(): void
    {
        parent::setUp();
        $this->infQixFoo = new InfQixFoo();
    }

    public function test_positive_integer_input(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Number must be a positive integer.');

        $this->infQixFoo->multiple(0);
        $this->infQixFoo->multiple(-10);
        $this->infQixFoo->multiple('abc');
        $this->infQixFoo->multiple('1a');
        $this->infQixFoo->multiple('12.34');
        $this->infQixFoo->multiple('!@#$');
    }

    public function test_number_is_multiple_of_eight(): void
    {
        $this->assertSame('Inf', $this->infQixFoo->multiple(8));
        $this->assertSame('Inf', $this->infQixFoo->multiple(16));
        $this->assertSame('Inf', $this->infQixFoo->multiple(32));
    }

    public function test_number_is_multiple_of_seven(): void
    {
        $this->assertSame('Qix', $this->infQixFoo->multiple(7));
        $this->assertSame('Qix', $this->infQixFoo->multiple(14));
        $this->assertSame('Qix', $this->infQixFoo->multiple(28));
    }

    public function test_number_is_multiple_of_three(): void
    {
        $this->assertSame('Foo', $this->infQixFoo->multiple(3));
        $this->assertSame('Foo', $this->infQixFoo->multiple(9));
        $this->assertSame('Foo', $this->infQixFoo->multiple(12));
    }

    public function test_number_is_multiple_of_several_numbers(): void
    {
        $this->assertSame('Inf; Qix', $this->infQixFoo->multiple(56));
        $this->assertSame('Qix; Foo', $this->infQixFoo->multiple(21));
        $this->assertSame('Inf; Foo', $this->infQixFoo->multiple(24));
        $this->assertSame('Inf; Qix; Foo', $this->infQixFoo->multiple(168));
    }

    public function test_number_with_no_multiples_returns_number_as_string(): void
    {
        $this->assertSame('2', $this->infQixFoo->multiple(2));
        $this->assertSame('4', $this->infQixFoo->multiple(4));
        $this->assertSame('22', $this->infQixFoo->multiple(22));
    }
}
