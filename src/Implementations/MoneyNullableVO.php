<?php

declare(strict_types=1);

namespace Funeralzone\ValueObjectExtensions\Implementations;

use Funeralzone\ValueObjectExtensions\ComplexScalars\MoneyNullbaleTrait;
use Funeralzone\ValueObjects\ValueObject;

/**
 * Class MoneyNullableVO
 * @package App\ValueObject
 */
final class MoneyNullableVO implements ValueObject
{
    use MoneyNullbaleTrait;
}
