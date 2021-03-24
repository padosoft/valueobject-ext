<?php

// @codingStandardsIgnoreFile

declare(strict_types=1);

namespace Funeralzone\ValueObjectExtensions\ComplexScalars;

use Funeralzone\ValueObjects\ValueObject;
use PHPUnit\Framework\TestCase;

final class EmailNullableTraitTest extends TestCase
{
    public function test_is_null_returns_false()
    {
        $test = new _EmailNullableTrait('test@test.com');
        $this->assertFalse($test->isNull());
    }

    public function test_is_null_returns_true()
    {
        $test = new _EmailNullableTrait(null);
        $this->assertTrue($test->isNull());
    }

    public function test_is_same_returns_true_when_values_match()
    {
        $test1 = new _EmailNullableTrait('test@test.com');
        $test2 = new _EmailNullableTrait('test@test.com');

        $this->assertTrue($test1->isSame($test2));
    }

    public function test_is_same_returns_false_when_values_mismatch()
    {
        $test1 = new _EmailNullableTrait('test@test.com');
        $test2 = new _EmailNullableTrait('test2@test.com');

        $this->assertFalse($test1->isSame($test2));
    }

    public function test_is_same_returns_true_when_values_null()
    {
        $test1 = new _EmailNullableTrait(null);
        $test2 = new _EmailNullableTrait(null);

        $this->assertTrue($test1->isSame($test2));
    }

    public function test_is_same_returns_false_when_values_null_and_not_null()
    {
        $test1 = new _EmailNullableTrait('test@test.com');
        $test2 = new _EmailNullableTrait(null);

        $this->assertFalse($test1->isSame($test2));
    }

    public function test_from_native_instantiates_with_valid_string()
    {
        $test = _EmailNullableTrait::fromNative('test@test.com');
        $this->assertEquals('test@test.com', $test->toNative());
    }

    public function test_from_native_throws_exception_with_invalid_string()
    {
        $this->expectException(\InvalidArgumentException::class);
        _EmailNullableTrait::fromNative('invalid');
    }

    public function test_from_native_null()
    {
        $this->assertTrue(_EmailNullableTrait::fromNative(null)->toNative()===null);
    }
}

final class _EmailNullableTrait implements ValueObject
{
    use EmailNullableTrait;
}
