<?php

declare(strict_types=1);

namespace Funeralzone\ValueObjectExtensions\Implementations;

use Funeralzone\ValueObjectExtensions\ComplexScalars\UUIDTrait;
use Funeralzone\ValueObjects\ValueObject;

/**
 * Class UUIDVO
 * @package App\ValueObject
 */
final class UUIDVO implements ValueObject
{
    use UUIDTrait;
}
