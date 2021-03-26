<?php

declare(strict_types=1);

namespace Funeralzone\ValueObjectExtensions\ComplexScalars;

use Funeralzone\ValueObjectExtensions\Implementations\ISOAlpha2CountryCodeVO;
use Funeralzone\ValueObjectExtensions\Implementations\PhoneNumberTypeVO;
use Funeralzone\ValueObjects\ValueObject;
use libphonenumber\PhoneNumber;
use libphonenumber\PhoneNumberType;

abstract class PhoneNumberAbstract
{
    /**
     * @var PhoneNumber
     */
    protected PhoneNumber $phoneNumber;


    /**
     * PhoneNumber constructor.
     * @param string $phoneNumber
     */
    public function __construct(string $phoneNumber)
    {
        $phoneUtil = \libphonenumber\PhoneNumberUtil::getInstance();
        try {
            $this->phoneNumber = $phoneUtil->parse($phoneNumber);

        } catch (\libphonenumber\NumberParseException $e) {
            throw new \InvalidArgumentException('Invalid phone number string.');
        }
    }

    /**
     * @return bool
     */
    public function isNull(): bool
    {
        return false;
    }

    /**
     * @param ValueObject $object
     * @return bool
     */
    public function isSame(ValueObject $object): bool
    {
        return ($this->toNative() === $object->toNative());
    }

    /**
     * @param string $native
     * @return static
     */
    public static function fromNative($native)
    {
        return new static($native);
    }

    protected function toFormat(int $format)
    {
        $phoneUtil = \libphonenumber\PhoneNumberUtil::getInstance();
        return $phoneUtil->format($this->phoneNumber, $format);
    }

    /**
     * @return string
     */
    public function toNative()
    {
        return $this->formatE164();
    }

    /**
     * @return string
     */
    public function formatE164(): string
    {
        return $this->toFormat(\libphonenumber\PhoneNumberFormat::E164);
    }

    /**
     * @return string
     */
    public function formatNational(): string
    {
        return $this->toFormat(\libphonenumber\PhoneNumberFormat::NATIONAL);
    }

    /**
     * @return string
     */
    public function formatInternational(): string
    {
        return $this->toFormat(\libphonenumber\PhoneNumberFormat::INTERNATIONAL);
    }

    /**
     * @return string
     */
    public function formatRFC3966() : string
    {
        return $this->toFormat(\libphonenumber\PhoneNumberFormat::RFC3966);
    }

    /**
     * @return PhoneNumberTypeVO
     */
    public function getNumberType() : PhoneNumberTypeVO
    {
        $phoneUtil = \libphonenumber\PhoneNumberUtil::getInstance();
        return PhoneNumberTypeVO::fromNative(PhoneNumberType::values()[$phoneUtil->getNumberType($this->phoneNumber)]);
    }

    /**
     * @return ISOAlpha2CountryCodeVO
     */
    public function getRegionCode() : ISOAlpha2CountryCodeVO
    {
        $phoneUtil = \libphonenumber\PhoneNumberUtil::getInstance();
        return ISOAlpha2CountryCodeVO::fromNative($phoneUtil->getRegionCodeForNumber($this->phoneNumber));
    }

    /**
     * @return object
     */
    public function getUnderlinedObject()
    {
        return $this->phoneNumber;
    }
}
