<?php

// @codingStandardsIgnoreFile

declare(strict_types=1);

namespace Funeralzone\ValueObjectExtensions\Implementations;

use Funeralzone\ValueObjects\ValueObject;
use PHPUnit\Framework\TestCase;

final class EmailWithAliasTest extends TestCase
{
    public function test_composite()
    {
        $test = new EmailWithAliasVO(EmailVO::fromNative('test@test.com'), StringVO::fromNative('test'));
        $this->assertEquals($test->getEmail()->toNative(), 'test@test.com');
        $this->assertEquals($test->getAlias()->toNative(), 'test');
    }

    public function test_from_native_instantiates_with_valid_string()
    {
        $test = EmailWithAliasVO::fromNative(['email'=>'test@test.com', 'alias'=>'test']);
        $this->assertEquals($test->getEmail()->toNative(), 'test@test.com');
        $this->assertEquals($test->getAlias()->toNative(), 'test');
    }

    public function test_from_string_instantiates_with_valid_string()
    {
        $test = EmailWithAliasVO::fromString('test;test@test.com');
        $this->assertEquals($test->getEmail()->toNative(), 'test@test.com');
        $this->assertEquals($test->getAlias()->toNative(), 'test');
    }

    public function test_from_native_throws_exception_with_invalid_string()
    {
        $this->expectException(\TypeError::class);
        EmailWithAliasVO::fromNative(['invalid']);
    }

    public function test_from_string_throws_exception_with_invalid_string()
    {
        $this->expectException(\TypeError::class);
        EmailWithAliasVO::fromString('invalid');
    }
}
