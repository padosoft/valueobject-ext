<?php

// @codingStandardsIgnoreFile

declare(strict_types=1);

namespace Funeralzone\ValueObjectExtensions\ComplexScalars;

use Funeralzone\ValueObjectExtensions\Implementations\FixedNumberVO;
use Funeralzone\ValueObjectExtensions\Implementations\MobileNumberVO;
use PHPUnit\Framework\TestCase;

final class FixedLineNumberTraitTest extends TestCase
{
    public function test_is_fixed_number()
    {
        $test = new FixedNumberVO('+39 055 2146958');
        $this->assertFalse($test->isNull());
    }

    public function test_is_not_fixed_number()
    {
        $this->expectException(\InvalidArgumentException::class);
        FixedNumberVO::fromNative('+39 333 2146958');
    }
}
