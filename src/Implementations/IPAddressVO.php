<?php

declare(strict_types=1);

namespace Funeralzone\ValueObjectExtensions\Implementations;

/**
 * Class IPAddressVO
 * @package App\ValueObject
 */
class IPAddressVO extends DomainVO
{
    /**
     * Returns a new IPAddress.
     *
     * @param string $value
     */
    public function __construct(string $value)
    {
        $filteredValue = filter_var($value, FILTER_VALIDATE_IP);

        if (false === $filteredValue) {
            throw new \InvalidArgumentException('Invalid string ip address.');
        }

        $this->value = $filteredValue;
    }

    /**
     * Returns the version (IPv4 or IPv6) of the ip address.
     *
     * @return IPAddressVersionVO
     */
    public function getVersion(): IPAddressVersionVO
    {
        $isIPv4 = filter_var($this->toNative(), FILTER_VALIDATE_IP, FILTER_FLAG_IPV4);

        if (false !== $isIPv4) {
            return IPAddressVersionVO::IPV4();
        }

        return IPAddressVersionVO::IPV6();
    }
}
