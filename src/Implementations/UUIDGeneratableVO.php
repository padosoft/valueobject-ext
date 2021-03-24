<?php

declare(strict_types=1);

namespace Funeralzone\ValueObjectExtensions\Implementations;

use Funeralzone\ValueObjectExtensions\ComplexScalars\GeneratableUUIDTrait;
use Funeralzone\ValueObjectExtensions\ComplexScalars\UUIDTrait;
use Funeralzone\ValueObjects\ValueObject;

/**
 * Class UUIDGeneratableVO
 * @package App\ValueObject
 */
final class UUIDGeneratableVO implements ValueObject
{
    use GeneratableUUIDTrait, UUIDTrait;
}
