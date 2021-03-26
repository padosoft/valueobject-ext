<?php

declare(strict_types=1);

namespace Funeralzone\ValueObjectExtensions\Implementations;

use Funeralzone\ValueObjectExtensions\ComplexScalars\PhoneNumberAbstract;
use Funeralzone\ValueObjects\ValueObject;

/**
 * Class MobileNumberNullableVO
 * @package App\ValueObject
 */
final class MobileNumberNullableVO extends PhoneNumberAbstract implements ValueObject
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

        if ($this->getNumberType() != PhoneNumberTypeVO::MOBILE()) {
            throw new \InvalidArgumentException('Invalid mobile phone number string.');
        }
    }
}
