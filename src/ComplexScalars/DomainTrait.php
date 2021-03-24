<?php

declare(strict_types=1);

namespace Funeralzone\ValueObjectExtensions\ComplexScalars;

use Funeralzone\ValueObjectExtensions\Implementations\HostnameVO;
use Funeralzone\ValueObjectExtensions\Implementations\IPAddressVO;
use Funeralzone\ValueObjects\ValueObject;

trait DomainTrait
{
    /**
     * @var string
     */
    protected $value;

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

    /**
     * @return string
     */
    public function toNative()
    {
        return $this->value;
    }


    /**
     * Returns a Hostname or a IPAddress Value Object depending on passed value.
     *
     * @param $domain
     *
     * @return HostnameVO|IPAddressVO
     */
    public static function specifyType($domain)
    {
        if (false !== filter_var($domain, FILTER_VALIDATE_IP)) {
            return IPAddressVO::fromNative($domain);
        }

        return HostnameVO::fromNative($domain);
    }
}
