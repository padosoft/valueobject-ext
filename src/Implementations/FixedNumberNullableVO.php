<?php

declare(strict_types=1);

namespace Funeralzone\ValueObjectExtensions\Implementations;

use Funeralzone\ValueObjectExtensions\ComplexScalars\PhoneNumberNullableAbstract;
use Funeralzone\ValueObjects\ValueObject;

/**
 * Class FixedNumberNullableVO
 * @package App\ValueObject
 */
final class FixedNumberNullableVO extends PhoneNumberNullableAbstract implements ValueObject
{

    /**
     * PhoneNumber constructor.
     * @param ?string $phoneNumber
     */
    public function __construct(?string $phoneNumber)
    {
        parent::__construct($phoneNumber);

        if ($this->phoneNumber === null) {
            return;
        }

        if ($this->getNumberType() != PhoneNumberTypeVO::FIXED_LINE()) {
            throw new \InvalidArgumentException('Invalid fixed line phone number string.');
        }
    }
}
