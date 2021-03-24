<?php

declare(strict_types=1);

namespace Funeralzone\ValueObjectExtensions\Implementations;

use Funeralzone\ValueObjectExtensions\ComplexScalars\EmailTrait;
use Funeralzone\ValueObjects\ValueObject;

/**
 * Class EmailVO
 * @package App\ValueObject
 */
final class EmailVO implements ValueObject
{
    use EmailTrait;
}
