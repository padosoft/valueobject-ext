<?php

declare(strict_types=1);

namespace Funeralzone\ValueObjectExtensions\Implementations;

use Funeralzone\ValueObjects\Sets\NonNullSet;

final class SetOfEmailsWithAliasVO extends NonNullSet
{
    /**
     * @return string
     */
    protected function typeToEnforce(): string
    {
        return EmailWithAliasVO::class;
    }

    /**
     * @return bool
     */
    public static function valuesShouldBeUnique(): bool
    {
        return true;
    }


    /**
     * Create a SetOfEmailsWithAliasVO from a string in this format
     * alias1;email1\n
     * alias2;email2\n
     * ....
     * aliasN;emailN
     *
     * @param string $string Formato stringa: "alias1;email1\nalias2;email2\n.....aliasN;emailN"
     * @return static
     */
    public static function fromString(string $string): self
    {
        try {
            //"alias1;email1\nalias2;email2\n.....aliasN;emailN"
            $arr = explode("\n", $string);
            if ($arr === false || !is_array($arr) || count($arr) < 1) {
                throw new \InvalidArgumentException('Invalid email with alias string. Input must be in the form: "alias1;email1\nalias2;email2\n....aliasN;emailN"');
            }

            $arrEmailWithAlias = [];
            foreach ($arr as $value) {
                $arrEmailWithAlias[] = EmailWithAliasVO::fromString($value);
            }

            $set = new static($arrEmailWithAlias);
            return $set;

        } catch (\Exception $exception) {
            throw new \InvalidArgumentException('Invalid email with alias string. Input must be in the form: "alias1;email1\nalias2;email2\n....aliasN;emailN"');
        }
    }
}
