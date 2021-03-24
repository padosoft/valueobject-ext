<?php

declare(strict_types=1);


namespace Funeralzone\ValueObjectExtensions\Implementations;

use Funeralzone\ValueObjects\Enums\EnumTrait;
use Funeralzone\ValueObjects\ValueObject;

/**
 * @method static DeviceVersionVO MOBILE()
 * @method static DeviceVersionVO TABLET()
 * @method static DeviceVersionVO DESKTOP()
 */
final class DeviceVersionVO implements ValueObject
{
    use EnumTrait;

    public const MOBILE = 'MOBILE';
    public const TABLET = 'TABLET';
    public const DESKTOP = 'DESKTOP';
}
