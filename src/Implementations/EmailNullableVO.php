<?php

namespace Funeralzone\ValueObjectExtensions\Implementations;

use Funeralzone\ValueObjectExtensions\ComplexScalars\EmailNullableTrait;
use Funeralzone\ValueObjects\ValueObject;

/**
 * Class EmailNullableVO
 * @package App\ValueObject
 */
final class EmailNullableVO implements ValueObject
{
    use EmailNullableTrait;
}
