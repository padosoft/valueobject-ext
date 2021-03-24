<?php

declare(strict_types=1);


namespace Funeralzone\ValueObjectExtensions\Implementations;

use Funeralzone\ValueObjects\Enums\EnumTrait;
use Funeralzone\ValueObjects\ValueObject;

/**
 * @method static IPAddressVersionVO IPV4()
 * @method static IPAddressVersionVO IPV6()
 */
final class IPAddressVersionVO implements ValueObject
{
    use EnumTrait;

    public const IPV4 = 'IPV4';
    public const IPV6 = 'IPV6';
}
