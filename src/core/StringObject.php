<?php
/**
 * This file is part of Swoole.
 *
 * @link     https://www.swoole.com
 * @contact  team@swoole.com
 * @license  https://github.com/swoole/library/blob/master/LICENSE
 */

declare(strict_types=1);

namespace Swoole;

class StringObject
{
    /**
     * @var string
     */
    protected $string;

    /**
     * StringObject constructor.
     * @param $string
     */
    public function __construct(string $string = '')
    {
        $this->string = $string;
    }

    public function __toString(): string
    {
        return $this->string;
    }

    public function length(): int
    {
        return strlen($this->string);
    }

    /**
     * @return false|int
     */
    public function indexOf(string $needle, int $offset = 0)
    {
        return strpos($this->string, $needle, $offset);
    }

    /**
     * @return false|int
     */
    public function lastIndexOf(string $needle, int $offset = 0)
    {
        return strrpos($this->string, $needle, $offset);
    }

    /**
     * @return false|int
     */
    public function pos(string $needle, int $offset = 0)
    {
        return strpos($this->string, $needle, $offset);
    }

    /**
     * @return false|int
     */
    public function rpos(string $needle, int $offset = 0)
    {
        return strrpos($this->string, $needle, $offset);
    }

    /**
     * @return false|int
     */
    public function ipos(string $needle)
    {
        return stripos($this->string, $needle);
    }

    /**
     * @return static
     */
    public function lower(): self
    {
        return new static(strtolower($this->string));
    }

    /**
     * @return static
     */
    public function upper(): self
    {
        return new static(strtoupper($this->string));
    }

    /**
     * @return static
     */
    public function trim(): self
    {
        return new static(trim($this->string));
    }

    /**
     * @return static
     */
    public function lrim(): self
    {
        return new static(ltrim($this->string));
    }

    /**
     * @return static
     */
    public function rtrim(): self
    {
        return new static(rtrim($this->string));
    }

    /**
     * @return static
     */
    public function substr(int $offset, ?int $length = null)
    {
        return new static(substr($this->string, $offset, $length));
    }

    public function repeat(int $n): StringObject
    {
        return new static(str_repeat($this->string, $n));
    }

    /**
     * @param int $count
     * @return static
     */
    public function replace(string $search, string $replace, &$count = null)
    {
        return new static(str_replace($search, $replace, $this->string, $count));
    }

    public function startsWith(string $needle): bool
    {
        return strpos($this->string, $needle) === 0;
    }

    public function contains(string $subString): bool
    {
        return strpos($this->string, $subString) !== false;
    }

    public function endsWith(string $needle): bool
    {
        return strrpos($this->string, $needle) === (strlen($needle) - 1);
    }

    public function split(string $delimiter, int $limit = PHP_INT_MAX): ArrayObject
    {
        return static::detectArrayType(explode($delimiter, $this->string, $limit));
    }

    public function char(int $index): string
    {
        return $this->string[$index];
    }

    /**
     * @return static
     */
    public function chunkSplit(int $chunkLength = 1, string $chunkEnd = '')
    {
        return new static(chunk_split($this->string, $chunkLength, $chunkEnd));
    }

    public function chunk(int $splitLength = 1): ArrayObject
    {
        return static::detectArrayType(str_split($this->string, $splitLength));
    }

    /**
     * @return string
     */
    public function toString()
    {
        return $this->string;
    }

    protected static function detectArrayType(array $value): ArrayObject
    {
        return new ArrayObject($value);
    }
}
