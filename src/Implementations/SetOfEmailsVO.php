<?php

declare(strict_types=1);

namespace Funeralzone\ValueObjectExtensions\Implementations;

use Funeralzone\ValueObjects\Sets\NonNullSet;

final class SetOfEmailsVO extends NonNullSet
{
    /**
     * @return string
     */
    protected function typeToEnforce(): string
    {
        return EmailVO::class;
    }

    /**
     * @return bool
     */
    public static function valuesShouldBeUnique(): bool
    {
        return true;
    }

    /**
     * Create a SetOfEmailVO from a string in this format email1;email2;.....emailN
     *
     * @param string $string Formato stringa: "email1;email2;.....emailN"
     * @return static
     */
    public static function fromString(string $string): self
    {
        try {
            $arrEmailsVO = [];
            $emails = explode(';', $string);
            foreach ($emails as $email) {
                $arrEmailsVO[] = EmailVO::fromNative($email);
            }

            return new static($arrEmailsVO);

        } catch (\Exception $exception) {
            throw new \InvalidArgumentException('Invalid email with alias string. Input must be in the form: "email1;email2;.....emailN"');
        }
    }
}
