<?php

// @codingStandardsIgnoreFile

declare(strict_types=1);

namespace Funeralzone\ValueObjectExtensions\ComplexScalars;

use Funeralzone\ValueObjectExtensions\Implementations\MobileNumberNullableVO;
use PHPUnit\Framework\TestCase;

final class MobileNumberNullableTraitTest extends TestCase
{
    public function test_accept_null()
    {
        $test = new MobileNumberNullableVO(null);
        $this->assertTrue($test->isNull());
    }

    public function test_is_mobile_number()
    {
        $test = new MobileNumberNullableVO('+39 333 2146958');
        $this->assertFalse($test->isNull());
    }

    public function test_is_not_mobile_number()
    {
        $this->expectException(\InvalidArgumentException::class);
        MobileNumberNullableVO::fromNative('+39 055 2146958');
    }
}
