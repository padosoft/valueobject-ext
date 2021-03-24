<?php

namespace Funeralzone\ValueObjectExtensions\Implementations;

use Funeralzone\ValueObjectExtensions\ComplexScalars\StringNullableTrait;
use Funeralzone\ValueObjects\ValueObject;

/**
 * Class StringNullableVO
 * @package App\ValueObject
 */
final class StringNullableVO implements ValueObject
{
    use StringNullableTrait;
}
