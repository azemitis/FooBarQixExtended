<?php declare(strict_types=1);

namespace tests\Unit\FooBarQixTests;

use App\FooBarQix;
use PHPUnit\Framework\TestCase;

class FooBarQixOccurrencesTest extends TestCase
{
    private FooBarQix $fooBarQix;

    protected function setUp(): void
    {
        parent::setUp();
        $this->fooBarQix = new FooBarQix();
    }

    public function test_number_contains_digit_three(): void
    {
        $this->assertSame('Foo', $this->fooBarQix->occurrence(3));
        $this->assertSame('Foo', $this->fooBarQix->occurrence(13));
        $this->assertSame('Foo', $this->fooBarQix->occurrence(23));
    }

    public function test_number_contains_digit_five(): void
    {
        $this->assertSame('Bar', $this->fooBarQix->occurrence(5));
        $this->assertSame('Bar', $this->fooBarQix->occurrence(15));
        $this->assertSame('Bar', $this->fooBarQix->occurrence(50));
    }

    public function test_number_contains_digit_seven(): void
    {
        $this->assertSame('Qix', $this->fooBarQix->occurrence(7));
        $this->assertSame('Qix', $this->fooBarQix->occurrence(17));
        $this->assertSame('Qix', $this->fooBarQix->occurrence(27));
    }

    public function test_number_contains_multiple_digits(): void
    {
        $this->assertSame('Bar, Foo', $this->fooBarQix->occurrence(53));
        $this->assertSame('Bar, Qix', $this->fooBarQix->occurrence(57));
        $this->assertSame('Foo, Bar', $this->fooBarQix->occurrence(35));
        $this->assertSame('Foo, Qix', $this->fooBarQix->occurrence(37));
        $this->assertSame('Qix, Foo', $this->fooBarQix->occurrence(73));
        $this->assertSame('Qix, Bar', $this->fooBarQix->occurrence(75));

        $this->assertSame('Foo, Bar, Qix', $this->fooBarQix->occurrence(357));
        $this->assertSame('Foo, Qix, Bar', $this->fooBarQix->occurrence(375));
        $this->assertSame('Bar, Foo, Qix', $this->fooBarQix->occurrence(537));
        $this->assertSame('Bar, Qix, Foo', $this->fooBarQix->occurrence(573));
        $this->assertSame('Qix, Bar, Foo', $this->fooBarQix->occurrence(753));
        $this->assertSame('Qix, Foo, Bar', $this->fooBarQix->occurrence(735));
    }
}
