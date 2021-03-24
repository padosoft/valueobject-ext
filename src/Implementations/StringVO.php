<?php

declare(strict_types=1);

namespace Funeralzone\ValueObjectExtensions\Implementations;

use Funeralzone\ValueObjects\Scalars\StringTrait;
use Funeralzone\ValueObjects\ValueObject;

/**
 * Class StringVO
 * @package App\ValueObject
 */
final class StringVO implements ValueObject
{
    use StringTrait;

    public function __toString()
    {
        return $this->string;
    }
}
