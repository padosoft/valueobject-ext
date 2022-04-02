<?php

// @codingStandardsIgnoreFile

declare(strict_types=1);

namespace Funeralzone\ValueObjectExtensions\Implementations;

use Funeralzone\ValueObjects\ValueObject;
use PHPUnit\Framework\TestCase;

final class SetOfEmailsWithAliasVOTest extends TestCase
{
    public function test_set()
    {
        $test = new SetOfEmailsWithAliasVO([
            EmailWithAliasVO::fromNative([
                'email' => 'test@test.com',
                'alias' => 'test'
            ]),
            EmailWithAliasVO::fromNative(['email' => 'test2@test.com', 'alias' => 'test2'])
        ]);
        $this->assertEquals($test[0]->getEmail()->toNative(), 'test@test.com');
        $this->assertEquals($test[0]->getAlias()->toNative(), 'test');
        $this->assertEquals($test[1]->getEmail()->toNative(), 'test2@test.com');
        $this->assertEquals($test[1]->getAlias()->toNative(), 'test2');
    }

    public function test_from_native_instantiates_with_valid_string()
    {
        $test = SetOfEmailsWithAliasVO::fromNative([
            ['email' => 'test@test.com', 'alias' => 'test'],
            ['email' => 'test2@test.com', 'alias' => 'test2']
        ]);
        $this->assertEquals($test[0]->getEmail()->toNative(), 'test@test.com');
        $this->assertEquals($test[0]->getAlias()->toNative(), 'test');
        $this->assertEquals($test[1]->getEmail()->toNative(), 'test2@test.com');
        $this->assertEquals($test[1]->getAlias()->toNative(), 'test2');
    }

    public function test_from_string_instantiates_with_valid_string()
    {
        $test = SetOfEmailsWithAliasVO::fromString("test;test@test.com\ntest2;test2@test.com");
        $this->assertEquals($test[0]->getEmail()->toNative(), 'test@test.com');
        $this->assertEquals($test[0]->getAlias()->toNative(), 'test');
        $this->assertEquals($test[1]->getEmail()->toNative(), 'test2@test.com');
        $this->assertEquals($test[1]->getAlias()->toNative(), 'test2');
        $test = SetOfEmailsWithAliasVO::fromString("test;test@test.com\r\ntest2;test2@test.com");
        $this->assertEquals($test[0]->getEmail()->toNative(), 'test@test.com');
        $this->assertEquals($test[0]->getAlias()->toNative(), 'test');
        $this->assertEquals($test[1]->getEmail()->toNative(), 'test2@test.com');
        $this->assertEquals($test[1]->getAlias()->toNative(), 'test2');
    }

    public function test_from_native_throws_exception_with_invalid_string()
    {
        $this->expectException(\TypeError::class);
        SetOfEmailsWithAliasVO::fromNative(['invalid']);
    }

    public function test_from_string_throws_exception_with_invalid_string()
    {
        $this->expectException(\InvalidArgumentException::class);
        SetOfEmailsWithAliasVO::fromString('invalid');
    }

    public function test_toSimpleEmailArray()
    {
        $test = SetOfEmailsWithAliasVO::fromString("test;test@test.com\ntest2;test2@test.com");
        $this->assertEquals($test->toSimpleEmailArray(), ['test@test.com','test2@test.com']);
        $test = SetOfEmailsWithAliasVO::fromString("test;test@test.com\r\ntest2;test2@test.com");
        $this->assertEquals($test->toSimpleEmailArray(), ['test@test.com','test2@test.com']);
    }

    public function test_toSimpleAliasArray()
    {
        $test = SetOfEmailsWithAliasVO::fromString("test;test@test.com\ntest2;test2@test.com");
        $this->assertEquals($test->toSimpleAliasArray(), ['test','test2']);
        $test = SetOfEmailsWithAliasVO::fromString("test;test@test.com\r\ntest2;test2@test.com");
        $this->assertEquals($test->toSimpleAliasArray(), ['test','test2']);
    }
}
