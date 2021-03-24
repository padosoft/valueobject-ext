<?php

declare(strict_types=1);

namespace Funeralzone\ValueObjectExtensions\Implementations;

use Funeralzone\ValueObjectExtensions\ComplexScalars\DomainTrait;
use Funeralzone\ValueObjects\ValueObject;

/**
 * Class DomainVO
 * @package App\ValueObject
 */
class DomainVO implements ValueObject
{
    use DomainTrait;
}
