<?php

declare(strict_types=1);

namespace Funeralzone\ValueObjectExtensions\Implementations;

/**
 * Class HostnameVO
 * @package App\ValueObject
 */
class HostnameVO extends DomainVO
{
    /**
     * Returns a new HostnameVO.
     *
     * @param string $value
     */
    public function __construct(string $value)
    {
        //TODO: validate hostname
        /*$filteredValue = (Validator::ALLOW_DNS | Validator::ALLOW_LOCAL);

        if (false === $filteredValue) {
            throw new \InvalidArgumentException('Invalid string ip address.');
        }

        $this->value = $filteredValue;
        */
        $this->value = $value;
    }
}
