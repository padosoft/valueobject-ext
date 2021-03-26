<?php

declare(strict_types=1);

namespace Funeralzone\ValueObjectExtensions\Implementations;

use Funeralzone\ValueObjectExtensions\ComplexScalars\PhoneNumberAbstract;
use Funeralzone\ValueObjects\ValueObject;

/**
 * Class FixedNumberVO
 * @package App\ValueObject
 */
final class FixedNumberVO extends PhoneNumberAbstract implements ValueObject
{

    /**
     * PhoneNumber constructor.
     * @param string $phoneNumber
     */
    public function __construct(string $phoneNumber)
    {
        parent::__construct($phoneNumber);

        if ($this->getNumberType()!=PhoneNumberTypeVO::FIXED_LINE()) {
            throw new \InvalidArgumentException('Invalid fixed line phone number string.');
        }
    }
}
