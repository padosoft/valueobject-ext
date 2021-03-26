<?php

declare(strict_types=1);


namespace Funeralzone\ValueObjectExtensions\Implementations;

use Funeralzone\ValueObjects\Enums\EnumTrait;
use Funeralzone\ValueObjects\ValueObject;

/**
 * @method static PhoneNumberFormatTypeVO E164()
 * @method static PhoneNumberFormatTypeVO INTERNATIONAL()
 * @method static PhoneNumberFormatTypeVO NATIONAL()
 * @method static PhoneNumberFormatTypeVO RFC3966()
 */
final class PhoneNumberFormatTypeVO implements ValueObject
{
    use EnumTrait;

    public const E164 = 0;
    public const INTERNATIONAL = 1;
    public const NATIONAL = 2;
    public const RFC3966 = 3;
}
