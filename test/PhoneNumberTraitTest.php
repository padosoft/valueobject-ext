<?php

// @codingStandardsIgnoreFile

declare(strict_types=1);

namespace Funeralzone\ValueObjectExtensions\ComplexScalars;

use Funeralzone\ValueObjectExtensions\Implementations\PhoneNumberTypeVO;
use Funeralzone\ValueObjectExtensions\Implementations\PhoneNumberVO;
use PHPUnit\Framework\TestCase;

final class PhoneNumberTraitTest extends TestCase
{
    public function test_is_null_returns_false()
    {
        $test = new PhoneNumberVO('+39 333 2146958');
        $this->assertFalse($test->isNull());
    }

    public function test_is_same_returns_true_when_values_match()
    {
        $test1 = new PhoneNumberVO('+39 333 2146958');
        $test2 = new PhoneNumberVO('+39 333 2146958');

        $this->assertTrue($test1->isSame($test2));
    }

    public function test_is_same_returns_false_when_values_mismatch()
    {
        $test1 = new PhoneNumberVO('+39 333 2146958');
        $test2 = new PhoneNumberVO('+39 333 2146959');

        $this->assertFalse($test1->isSame($test2));
    }

    public function test_from_native_instantiates_with_valid_string()
    {
        $test = PhoneNumberVO::fromNative('+39 333 2146958');
        $this->assertEquals('+393332146958', $test->toNative());
    }

    public function test_from_native_throws_exception_with_invalid_string()
    {
        $this->expectException(\InvalidArgumentException::class);
        PhoneNumberVO::fromNative('invalid');
    }

    public function test_formatE164()
    {
        $test = PhoneNumberVO::fromNative('+39 333 2146958');
        $this->assertEquals('+393332146958', $test->formatE164());
    }

    public function test_formatInternational()
    {
        $test = PhoneNumberVO::fromNative('+39 333 2146958');
        $this->assertEquals('+39 333 214 6958', $test->formatInternational());
    }

    public function test_formatNational()
    {
        $test = PhoneNumberVO::fromNative('+39 333 2146958');
        $this->assertEquals('333 214 6958', $test->formatNational());
    }

    public function test_formatRFC3966()
    {
        $test = PhoneNumberVO::fromNative('+39 333 2146958');
        $this->assertEquals('tel:+39-333-214-6958', $test->formatRFC3966());
    }

    public function test_getNumberType()
    {
        $test = PhoneNumberVO::fromNative('+39 333 2146958');
        $this->assertEquals(PhoneNumberTypeVO::MOBILE(), $test->getNumberType());
    }

    public function test_getRegionCode()
    {
        $test = PhoneNumberVO::fromNative('+39 333 2146958');
        $this->assertEquals('IT', $test->getRegionCode()->toNative());
    }


}
