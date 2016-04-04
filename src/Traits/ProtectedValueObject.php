<?php

namespace Equip\Data\Traits;

use RuntimeException;

trait ProtectedValueObject
{
    /**
     * Checks if a property is defined in the object
     *
     * This will return `false` if the value is `null`! To check if a value
     * exists in the object, use `has()`.
     *
     * @param string $key
     *
     * @return boolean
     */
    public function __isset($key)
    {
        return isset($this->$key);
    }

    /**
     * Allow read access to immutable object properties
     *
     * @param string $key
     *
     * @return mixed
     */
    public function __get($key)
    {
        return $this->$key;
    }

    /**
     * Protects against the object being modified
     *
     * @param string $key
     * @param mixed  $value
     *
     * @return void
     *
     * @throws \RuntimeException
     */
    public function __set($key, $value)
    {
        throw new RuntimeException(sprintf(
            'Modification of immutable object `%s` is not allowed',
            get_class($this)
        ));
    }

    /**
     * Protects against the object being modified
     *
     * @param string $key
     *
     * @return void
     *
     * @throws \RuntimeException
     */
    public function __unset($key)
    {
        throw new RuntimeException(sprintf(
            'Modification of immutable object `%s` is not allowed',
            get_class($this)
        ));
    }
}
