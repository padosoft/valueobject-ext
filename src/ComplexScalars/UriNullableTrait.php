<?php

declare(strict_types=1);

namespace Funeralzone\ValueObjectExtensions\ComplexScalars;

use Funeralzone\ValueObjects\ValueObject;
use League\Uri\Http;
use League\Uri\Uri;
use Psr\Http\Message\UriInterface;

trait UriNullableTrait
{
    /**
     * @var ?UriInterface uri
     */
    protected ?UriInterface $uri;


    /**
     *  constructor.
     * @param ?UriInterface $uri
     */
    public function __construct(?UriInterface $uri)
    {
        $this->uri = $uri;
    }

    /**
     * @return bool
     */
    public function isNull(): bool
    {
        return $this->uri === null;
    }

    /**
     * @param ValueObject $object
     * @return bool
     */
    public function isSame(ValueObject $object): bool
    {
        if ($this->uri === null || $object->uri === null) {
            return $this->uri === $object->uri;
        }
        return ($this->toNative() === $object->toNative());
    }

    /**
     * @param ?string $native
     * @return static
     */
    public static function fromNative($native)
    {
        if (!is_string($native)) {
            throw new \InvalidArgumentException('Can only instantiate this object with a string.');
        }

        $uriTmp     = Uri::createFromString($native);
        $uri     = Http::createFromUri($uriTmp);

        return new static($uri);
    }

    /**
     * @return ?string
     */
    public function toNative()
    {
        return ($this->uri == null ? $this->uri->__toString() : null);
    }

    /**
     * @return UriInterface
     */
    public function getPsr7Uri(): UriInterface
    {
        return $this->uri;
    }

    /**
     * @param string $scheme
     *
     * @return static
     */
    public function withScheme(string $scheme)
    {
        return new static($this->uri->withScheme($scheme));
    }

    /**
     * @param string $user
     * @param string|null $password
     *
     * @return static
     */
    public function withUserInfo(string $user, string $password = null)
    {
        return new static($this->uri->withUserInfo($user, $password));
    }

    /**
     * @param string $host
     *
     * @return static
     */
    public function withHost(string $host)
    {
        return new static($this->uri->withHost($host));
    }

    /**
     * @param int $port
     *
     * @return static
     */
    public function withPort(int $port)
    {
        return new static($this->uri->withPort($port));
    }

    /**
     * @param string $path
     *
     * @return static
     */
    public function withPath(string $path)
    {
        return new static($this->uri->withPath($path));
    }

    /**
     * @param string $query
     *
     * @return static
     */
    public function withQuery(string $query)
    {
        return new static($this->uri->withQuery($query));
    }

    /**
     * @param string $fragment
     *
     * @return static
     */
    public function withFragment(string $fragment)
    {
        return new static($this->uri->withFragment($fragment));
    }
}
