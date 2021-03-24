<?php

// @codingStandardsIgnoreFile

declare(strict_types=1);

namespace Funeralzone\ValueObjectExtensions\Implementations;

use Funeralzone\ValueObjects\ValueObject;
use PHPUnit\Framework\TestCase;

final class SetOfEmailsVOTest extends TestCase
{
    public function test_set()
    {
        $test = new SetOfEmailsVO([EmailVO::fromNative('test@test.com'), EmailVO::fromNative('test2@test.com')]);
        $this->assertEquals($test[0]->toNative(), 'test@test.com');
        $this->assertEquals($test[1]->toNative(), 'test2@test.com');
    }

    public function test_from_native_instantiates_with_valid_string()
    {
        $test = SetOfEmailsVO::fromNative(['test@test.com','test2@test.com']);
        $this->assertEquals($test[0]->toNative(), 'test@test.com');
        $this->assertEquals($test[1]->toNative(), 'test2@test.com');
    }

    public function test_from_string_instantiates_with_valid_string()
    {
        $test = SetOfEmailsVO::fromString('test@test.com;test2@test.com');
        var_dump($test);
        $this->assertEquals($test[0]->toNative(), 'test@test.com');
        $this->assertEquals($test[1]->toNative(), 'test2@test.com');
    }

    public function test_from_native_throws_exception_with_invalid_string()
    {
        $this->expectException(\InvalidArgumentException::class);
        SetOfEmailsVO::fromNative(['invalid']);
    }

    public function test_from_string_throws_exception_with_invalid_string()
    {
        $this->expectException(\InvalidArgumentException::class);
        SetOfEmailsVO::fromString('invalid');
    }
}
