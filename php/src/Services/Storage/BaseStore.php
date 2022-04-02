<?php

declare(strict_types=1);

namespace App\Services\Storage;

/**
 * Class BaseStore
 * @version 1.0.0
 * @access public
 * @package App\Services\Storage
 */
abstract class BaseStore
{
    /**
     * @var array
     */
    private array $container = array();
    /**
     * @var int
     */
    private int $position = 0;
    
    /**
     * @param mixed $offset
     * @return bool
     */
    public function offsetExists($offset): bool
    {
        return isset($this->container[$offset]);
    }
    
    /**
     * @param mixed $offset
     * @return mixed|null
     */
    public function offsetGet($offset)
    {
        return $this->offsetExists($offset) ? $this->container[$offset] : null;
    }
    
    /**
     * @param mixed $offset
     * @param mixed $value
     */
    public function offsetSet($offset, $value): void
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }
    
    /**
     * @param mixed $offset
     */
    public function offsetUnset($offset): void
    {
        unset($this->container[$offset]);
    }
    
    /**
     *
     */
    public function rewind(): void
    {
        $this->position = 0;
    }
    
    /**
     * @return mixed
     */
    public function current()
    {
        return $this->container[$this->position];
    }
    
    /**
     * @return int
     */
    public function key(): int
    {
        return $this->position;
    }
    
    /**
     *
     */
    public function next(): void
    {
        ++$this->position;
    }
    
    /**
     * @return bool
     */
    public function valid(): bool
    {
        return isset($this->container[$this->position]);
    }
    
    /**
     * @return int
     */
    public function count(): int
    {
        return count($this->container);
    }
    
    /**
     * @return string
     */
    public function serialize(): string
    {
        return serialize($this->container);
    }
    
    /**
     * @param string $data
     */
    public function unserialize($data): void
    {
        $this->container = unserialize($data);
    }
    
    /**
     * @param array|null $data
     * @return array|void
     */
    public function __invoke(array $data = null)
    {
        if (is_null($data)) {
            return $this->container;
        } else {
            $this->container = $data;
        }
    }
    
    /**
     * @param $value
     * @return bool
     */
    public function hasValue($value): bool
    {
        return in_array($value, $this->container);
    }
    
    /**
     * @param mixed $value
     * @return int|string|false
     */
    public function searchValue($value): int|string|false
    {
        return array_search($value, $this->container);
    }
}