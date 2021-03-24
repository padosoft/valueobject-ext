<?php

declare(strict_types=1);

namespace Funeralzone\ValueObjectExtensions\ComplexScalars;

use Funeralzone\ValueObjectExtensions\Implementations\DeviceVersionVO;
use Funeralzone\ValueObjects\ValueObject;

trait DeviceTrait
{
    /**
     * @var string
     */
    protected $value;

    /**
     * constructor.
     * @param string $value
     */
    public function __construct(string $value)
    {
        if (!$this->validateDevice($value)) {
            throw new \InvalidArgumentException('Invalid device string.');
        }

        $this->value = $value;
    }

    /**
     * @param $value
     * @return bool
     */
    private function validateDevice($value) : bool
    {
        $value=strtoupper($value);
        return
            $value === DeviceVersionVO::MOBILE() ||
            $value === DeviceVersionVO::TABLET() ||
            $value === DeviceVersionVO::DESKTOP();
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

    /**
     * @return string
     */
    public function toNative()
    {
        return $this->value;
    }

    public function __toString()
    {
        return $this->value;
    }

    public static function createMobile()
    {
        return new static(DeviceVersionVO::MOBILE());
    }

    public static function createTablet()
    {
        return new static(DeviceVersionVO::TABLET());
    }

    public static function createDesktop()
    {
        return new static(DeviceVersionVO::DESKTOP());
    }
}
