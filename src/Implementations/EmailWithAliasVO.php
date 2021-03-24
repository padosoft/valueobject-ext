<?php

declare(strict_types=1);

namespace Funeralzone\ValueObjectExtensions\Implementations;

use Funeralzone\ValueObjects\CompositeTrait;
use Funeralzone\ValueObjects\ValueObject;

final class EmailWithAliasVO implements ValueObject
{
    use CompositeTrait;

    /**
     * @var EmailVO $email
     */
    private EmailVO $email;

    /**
     * @var StringVO $alias
     */
    private StringVO $alias;

    /**
     * EmailWithAliasVO constructor.
     * @param EmailVO $email
     * @param StringVO $alias
     */
    public function __construct(EmailVO $email, StringVO $alias)
    {
        $this->email = $email;
        $this->alias = $alias;
    }

    /**
     * @return EmailVO
     */
    public function getEmail(): EmailVO
    {
        return $this->email;
    }

    /**
     * @return StringVO
     */
    public function getAlias(): StringVO
    {
        return $this->alias;
    }

    /**
     * @param array $native ['email' => 'pippo@gmail.com', 'alias' => 'pippo']
     * @return static
     */
    public static function fromNative($native)
    {
        try {
            return new static(
                EmailVO::fromNative($native['email']),
                StringVO::fromNative($native['alias']),
            );
        } catch (\Exception $exception) {
            throw new \InvalidArgumentException('Invalid email with alias array. Input must be in the form: [\'email\' => \'pippo@gmail.com\', \'alias\' => \'pippo\']');
        }
    }

    /**
     * Create a EmailWithAliasVO from a string in this format alias;email
     *
     * @param string $string Formato stringa: "alias;email"
     * @return static
     */
    public static function fromString(string $string): self
    {
        try {
            $item = explode(';', $string);
            return new static(
                EmailVO::fromNative($item[1]),
                StringVO::fromNative($item[0])
            );
        } catch (\Exception $exception) {
            throw new \InvalidArgumentException('Invalid email with alias string. Input must be in the form: "alias;email"');
        }
    }
}
