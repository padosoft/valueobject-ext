<?php

// @codingStandardsIgnoreFile

declare(strict_types=1);

namespace Funeralzone\ValueObjectExtensions\ComplexScalars;

use Funeralzone\ValueObjectExtensions\Implementations\FixedNumberNullableVO;
use PHPUnit\Framework\TestCase;

final class FixedLineNumberNullableTraitTest extends TestCase
{
    public function test_accept_null()
    {
        $test = new FixedNumberNullableVO(null);
        $this->assertTrue($test->isNull());
    }

    public function test_is_fixed_number()
    {
        $test = new FixedNumberNullableVO('+39 055 2146958');
        $this->assertFalse($test->isNull());
    }

    public function test_is_not_fixed_number()
    {
        $this->expectException(\InvalidArgumentException::class);
        FixedNumberNullableVO::fromNative('+39 333 2146958');
    }
}
