<?php

declare(strict_types=1);

namespace Funeralzone\ValueObjectExtensions\Implementations;

use Funeralzone\ValueObjectExtensions\ComplexScalars\MoneyTrait;
use Funeralzone\ValueObjects\ValueObject;

/**
 * Class MoneyVO
 * @package App\ValueObject
 */
final class MoneyVO implements ValueObject
{
    use MoneyTrait;
}
