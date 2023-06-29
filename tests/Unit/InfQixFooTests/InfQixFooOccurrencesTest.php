<?php declare(strict_types=1);

namespace tests\Unit\InfQixFooTests;

use App\InfQixFoo;
use PHPUnit\Framework\TestCase;

class InfQixFooOccurrencesTest extends TestCase
{
    private InfQixFoo $infQixFoo;

    protected function setUp(): void
    {
        parent::setUp();
        $this->infQixFoo = new InfQixFoo();
    }

    public function test_number_contains_digit_eight(): void
    {
        $this->assertSame('Inf', $this->infQixFoo->occurrence(8));
        $this->assertSame('Inf', $this->infQixFoo->occurrence(18));
        $this->assertSame('Inf', $this->infQixFoo->occurrence(28));
    }

    public function test_number_contains_digit_seven(): void
    {
        $this->assertSame('Qix', $this->infQixFoo->occurrence(7));
        $this->assertSame('Qix', $this->infQixFoo->occurrence(17));
        $this->assertSame('Qix', $this->infQixFoo->occurrence(27));
    }

    public function test_number_contains_digit_three(): void
    {
        $this->assertSame('Foo', $this->infQixFoo->occurrence(3));
        $this->assertSame('Foo', $this->infQixFoo->occurrence(13));
        $this->assertSame('Foo', $this->infQixFoo->occurrence(23));
    }

    public function test_number_contains_multiple_digits(): void
    {
        $this->assertSame('Inf; Foo', $this->infQixFoo->occurrence(83));
        $this->assertSame('Inf; Qix', $this->infQixFoo->occurrence(87));
        $this->assertSame('Qix; Foo', $this->infQixFoo->occurrence(73));
        $this->assertSame('Qix; Inf', $this->infQixFoo->occurrence(78));
        $this->assertSame('Foo; Inf', $this->infQixFoo->occurrence(38));
        $this->assertSame('Foo; Qix', $this->infQixFoo->occurrence(37));

        $this->assertSame('Inf; Qix; Foo', $this->infQixFoo->occurrence(873));
        $this->assertSame('Inf; Foo; Foo', $this->infQixFoo->occurrence(833));
        $this->assertSame('Qix; Foo; Inf', $this->infQixFoo->occurrence(738));
        $this->assertSame('Qix; Inf; Foo', $this->infQixFoo->occurrence(783));
        $this->assertSame('Foo; Inf; Qix', $this->infQixFoo->occurrence(387));
        $this->assertSame('Foo; Qix; Inf', $this->infQixFoo->occurrence(378));
    }
}
