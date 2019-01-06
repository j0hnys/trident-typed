<?php

declare(strict_types=1);

namespace Spatie\Typed;

use Iterator;
use Countable;
use ArrayAccess;

class Map implements ArrayAccess, Iterator, Countable
{
    use ValidatesType;

    /** @var \Spatie\Typed\Type */
    private $valueType;

    /** @var \Spatie\Typed\Type */
    private $keyType;

    /** @var array */
    protected $data = [];

    /** @var int */
    private $position = 0;

    public function __construct($keyType, $valueType)
    {
        if (   $keyType instanceof Type
            && $valueType instanceof Type
            ) {
            $this->keyType = $keyType;
            $this->valueType = $valueType;

            return;
        }

        $firstKey = reset($keyType);
        $firstValue = reset($valueType);

        $this->keyType = T::infer($firstKey);
        $this->valueType = T::infer($firstValue);

        $this->set([$keyType => $valueType]);
    }

    public function set(array $data): self
    {
        foreach ($data as $key => $value) {
            $this[$key] = $value;
        }
        
        return $this;
    }

    public function current()
    {
        return $this->data[$this->position];
    }

    public function offsetGet($offset)
    {
        return isset($this->data[$offset]) ? $this->data[$offset] : null;
    }

    public function offsetSet($offset, $value)
    {
        $offset = $this->validateType($this->keyType, $offset);
        $value = $this->validateType($this->valueType, $value);
        
        $this->data[$offset] = $value;
        
    }

    public function offsetExists($offset)
    {
        return array_key_exists($offset, $this->data);
    }

    public function offsetUnset($offset)
    {
        unset($this->data[$offset]);
    }

    public function next()
    {
        $this->position++;
    }

    public function key()
    {
        return $this->position;
    }

    public function valid()
    {
        return array_key_exists($this->position, $this->data);
    }

    public function rewind()
    {
        $this->position = 0;
    }

    public function toArray(): array
    {
        return $this->data;
    }

    public function count(): int
    {
        return count($this->data);
    }
}
