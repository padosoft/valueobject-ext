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
     * NOTW: accept \r\n too (for windows)
     * @param string $string Formato stringa: "alias1;email1\nalias2;email2\n.....aliasN;emailN" accepts \r\n too
     * @return static
     */
    public static function fromString(string $string): self
    {
        try {
            $chars="\r\n";//"alias1;email1\r\nalias2;email2\r\n.....aliasN;emailN"
            if (strpos($string, $chars)===false) {
                $chars="\n";//"alias1;email1\nalias2;email2\n.....aliasN;emailN"
            }
            $arr = explode($chars, $string);
            if ($arr === false || !is_array($arr) || count($arr) < 1) {
                throw new \InvalidArgumentException(
                    'Invalid email with alias string. Input must be in the form: "alias1;email1\nalias2;email2\n....aliasN;emailN" or "alias1;email1\r\nalias2;email2\r\n....aliasN;emailN"'
                );
            }

            $arrEmailWithAlias = [];
            foreach ($arr as $value) {
                $arrEmailWithAlias[] = EmailWithAliasVO::fromString($value);
            }

            return new static($arrEmailWithAlias);
        } catch (\Exception $exception) {
            throw new \InvalidArgumentException(
                'Invalid email with alias string. Input must be in the form: "alias1;email1\nalias2;email2\n....aliasN;emailN" or "alias1;email1\r\nalias2;email2\r\n....aliasN;emailN"'
            );
        }
    }

    /**
     * Return simple array assoc. useful to fill select.
     *
     * @return array ['alias;email' => 'alias <email>','email2;email2' => 'alias2 <email2>',...]
     */
    public function toSimpleAssocArray(): array
    {
        $arrFinal = [];
        $arr = $this->toNative();
        foreach ($arr as $item) {
            $arrFinal[$item['alias'] . ';' . $item['email']] = $item['alias'] . ' <' . $item['email'] . '>';
        }
        return $arrFinal;
    }

    /**
     * Return simple array of email.
     *
     * @return array ['email','email2',...]
     */
    public function toSimpleEmailArray(): array
    {
        $arrFinal = [];
        $arr = $this->toNative();
        foreach ($arr as $item) {
            $arrFinal[] = $item['email'];
        }
        return $arrFinal;
    }

    /**
     * Return simple array of alias.
     *
     * @return array ['alias','alias2',...]
     */
    public function toSimpleAliasArray(): array
    {
        $arrFinal = [];
        $arr = $this->toNative();
        foreach ($arr as $item) {
            $arrFinal[] = $item['alias'];
        }
        return $arrFinal;
    }
}
