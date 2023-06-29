<?php declare(strict_types=1);

namespace tests\Unit\InfQixFooTests;

use App\InfQixFoo;
use PHPUnit\Framework\TestCase;

class InfQixFooMultipleOfEightTest extends TestCase
{
    private InfQixFoo $infQixFoo;

    protected function setUp(): void
    {
        parent::setUp();
        $this->infQixFoo = new InfQixFoo();
    }

    public function test_sum_of_digits_is_multiple_of_eight(): void
    {
        $this->assertFalse($this->infQixFoo->sumOfDigits(0));
        $this->assertFalse($this->infQixFoo->sumOfDigits(18));
        $this->assertTrue($this->infQixFoo->sumOfDigits(8));
        $this->assertTrue($this->infQixFoo->sumOfDigits(80));
        $this->assertTrue($this->infQixFoo->sumOfDigits(26));
    }

    public function test_Result_combined_with_eight(): void
    {
        $this->assertSame('Inf; InfInf', $this->infQixFoo->combined(8));
        $this->assertSame('26Inf', $this->infQixFoo->combined(26));
        $this->assertSame('Inf; InfInf', $this->infQixFoo->combined(80));
        $this->assertSame('Inf; Foo; Inf', $this->infQixFoo->combined(864));
        $this->assertSame('143; FooInf', $this->infQixFoo->combined(143));
    }
}
