<?php

declare(strict_types=1);

namespace Funeralzone\ValueObjectExtensions\Implementations;

use Funeralzone\ValueObjects\Sets\NullableSet;

final class SetOfEmailsNullableVO extends NullableSet
{
    /**
     * @return string
     */
    protected function typeToEnforce(): string
    {
        return EmailNullableVO::class;
    }

    /**
     * @return bool
     */
    public static function valuesShouldBeUnique(): bool
    {
        return true;
    }

    /**
     * @return string
     */
    protected static function nonNullImplementation(): string
    {
        return EmailVO::class;
    }

    /**
     * @return string
     */
    protected static function nullImplementation(): string
    {
        return EmailNullableVO::class;
    }
}
