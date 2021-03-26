<?php

declare(strict_types=1);

namespace Funeralzone\ValueObjectExtensions\ComplexScalars;

use Funeralzone\ValueObjects\ValueObject;
use function method_exists;
use Money\Currency;
use Money\Money;
use function var_dump;

trait MoneyNullbaleTrait
{
    /**
     * @var Money
     */
    protected $money;

    /**
     * MoneyTrait constructor.
     * @param ?Money $money
     */
    public function __construct(?Money $money)
    {
        $this->money = $money;
    }

    /**
     * @return bool
     */
    public function isNull(): bool
    {
        return ($this->money===null);
    }

    /**
     * @param ValueObject $object
     * @return bool
     */
    public function isSame(ValueObject $object): bool
    {
        if ($this->money===null || $object->money===null) {
            return $this->money===$object->money;
        }
        return ($object->toNative() == $this->toNative());
    }

    /**
     * @param array $native
     * @return static
     */
    public static function fromNative($native)
    {
        return new static(new Money(
            (string) $native['amount'],
            new Currency($native['currency'])
        ));
    }

    /**
     * @return array
     */
    public function toNative()
    {
        if ($this->money===null) {
            return null;
        }
        return [
            'amount' => $this->money->getAmount(),
            'currency' => $this->money->getCurrency()->getCode(),
        ];
    }

    /**
     * @return Money
     */
    public function getMoney(): Money
    {
        return $this->money;
    }
}
