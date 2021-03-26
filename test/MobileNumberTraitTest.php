<?php

// @codingStandardsIgnoreFile

declare(strict_types=1);

namespace Funeralzone\ValueObjectExtensions\ComplexScalars;

use Funeralzone\ValueObjectExtensions\Implementations\MobileNumberVO;
use PHPUnit\Framework\TestCase;

final class MobileNumberTraitTest extends TestCase
{
    public function test_is_mobile_number()
    {
        $test = new MobileNumberVO('+39 333 2146958');
        $this->assertFalse($test->isNull());
    }

    public function test_is_not_mobile_number()
    {
        $this->expectException(\InvalidArgumentException::class);
        MobileNumberVO::fromNative('+39 055 2146958');
    }
}
