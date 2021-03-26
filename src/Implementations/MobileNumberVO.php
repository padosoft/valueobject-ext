<?php

declare(strict_types=1);

namespace Funeralzone\ValueObjectExtensions\Implementations;

use Funeralzone\ValueObjectExtensions\ComplexScalars\PhoneNumberAbstract;
use Funeralzone\ValueObjects\ValueObject;

/**
 * Class MobileNumberVO
 * @package App\ValueObject
 */
final class MobileNumberVO extends PhoneNumberAbstract implements ValueObject
{

    /**
     * PhoneNumber constructor.
     * @param string $phoneNumber
     */
    public function __construct(string $phoneNumber)
    {
        parent::__construct($phoneNumber);

        if ($this->getNumberType()!=PhoneNumberTypeVO::MOBILE()) {
            throw new \InvalidArgumentException('Invalid mobile phone number string.');
        }
    }
}
