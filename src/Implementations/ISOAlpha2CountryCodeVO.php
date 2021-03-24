<?php

declare(strict_types=1);

namespace Funeralzone\ValueObjectExtensions\Implementations;

use Funeralzone\ValueObjectExtensions\ComplexScalars\ISOAlpha2CountryCodeTrait;
use Funeralzone\ValueObjects\ValueObject;

/**
 * Class ISOAlpha2CountryCodeVO
 * @package App\ValueObject
 */
final class ISOAlpha2CountryCodeVO implements ValueObject
{
    use ISOAlpha2CountryCodeTrait;
}
