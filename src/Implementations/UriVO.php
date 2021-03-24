<?php

declare(strict_types=1);

namespace Funeralzone\ValueObjectExtensions\Implementations;

use Funeralzone\ValueObjectExtensions\ComplexScalars\UriTrait;
use Funeralzone\ValueObjects\ValueObject;

/**
 * Class UriVO
 * @package App\ValueObject
 */
final class UriVO implements ValueObject
{
    use UriTrait;
}
