<?php

declare(strict_types=1);

namespace Funeralzone\ValueObjectExtensions\Implementations;

/**
 * Class IPAddressV4VO
 * @package App\ValueObject
 */
final class IPAddressV4VO extends IPAddressVO
{
    /**
     * Returns a new IPAddressV4.
     *
     * @param string $value
     */
    public function __construct(string $value)
    {
        $filteredValue = filter_var($value, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4);

        if (false === $filteredValue) {
            throw new \InvalidArgumentException('Invalid string ipv4 address.');
        }

        $this->value = $filteredValue;
    }
}
