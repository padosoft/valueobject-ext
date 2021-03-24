<?php

declare(strict_types=1);

namespace Funeralzone\ValueObjectExtensions\Implementations;

use Funeralzone\ValueObjectExtensions\ComplexScalars\ISOAlpha3CountryCodeTrait;
use Funeralzone\ValueObjects\ValueObject;

/**
 * Class ISOAlpha3CountryCodeVO
 * @package App\ValueObject
 */
final class ISOAlpha3CountryCodeVO implements ValueObject
{
    use ISOAlpha3CountryCodeTrait;
}
