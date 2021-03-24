<?php

declare(strict_types=1);


namespace Funeralzone\ValueObjectExtensions\Implementations;

use Funeralzone\ValueObjectExtensions\ComplexScalars\DeviceWithUnknownTrait;
use Funeralzone\ValueObjects\ValueObject;

final class DeviceWithUnknownVO implements ValueObject
{
    use DeviceWithUnknownTrait;
}
