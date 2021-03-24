<?php

declare(strict_types=1);

namespace Funeralzone\ValueObjectExtensions\Implementations;

use Funeralzone\ValueObjectExtensions\ComplexScalars\UriTrait;
use Funeralzone\ValueObjects\Sets\NonNullSet;

final class SetOfUriVO extends NonNullSet
{
    /**
     * @return string
     */
    protected function typeToEnforce(): string
    {
        return UriTrait::class;
    }

    /**
     * @return bool
     */
    public static function valuesShouldBeUnique(): bool
    {
        return true;
    }

    /**
     * Create a Set from a string in this format uri1;uri2;.....uriN
     *
     * @param string $string Formato stringa: "uri1;uri2;.....uriN"
     * @return static
     */
    public static function fromString(string $string): self
    {
        try {
            $arrVO = [];
            $items = explode(';', $string);
            foreach ($items as $item) {
                $arrVO[] = UriVO::fromNative($item);
            }

            return new static($arrVO);

        } catch (\Exception $exception) {
            throw new \InvalidArgumentException('Invalid uri string. Input must be in the form: "uri1;uri2;.....uriN"');
        }
    }
}
