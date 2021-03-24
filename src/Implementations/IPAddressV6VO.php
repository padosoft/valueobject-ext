<?php

declare(strict_types=1);

namespace Funeralzone\ValueObjectExtensions\Implementations;

/**
 * Class IPAddressV6VO
 * @package App\ValueObject
 */
final class IPAddressV6VO extends IPAddressVO
{
    /**
     * Returns a new IPAddressV6.
     *
     * @param string $value
     */
    public function __construct(string $value)
    {
        $filteredValue = filter_var($value, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6);

        if (false === $filteredValue) {
            throw new \InvalidArgumentException('Invalid string ipv6 address.');
        }

        $this->value = $filteredValue;
    }
}
