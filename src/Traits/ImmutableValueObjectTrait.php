<?php

namespace Spark\Data\Traits;

trait ImmutableValueObjectTrait
{
    /**
     * Hydrate the object with new values
     *
     * @param array $data
     */
    public function __construct(array $data = [])
    {
        if ($data) {
            $this->apply($data);
        }
    }

    /**
     * Create a copy of the object with new values
     *
     * @param array $data
     *
     * @return static
     */
    public function withData(array $data)
    {
        $copy = clone $this;
        $copy->apply($data);
        return $copy;
    }

    /**
     * Type definitions for object properties
     *
     *     return [
     *         'id'         => 'int',
     *         'email'      => 'string',
     *         'is_deleted' => 'bool',
     *      ];
     *
     * Overload this method to enable type coercion!
     *
     * @return array
     */
    private function types()
    {
        return [];
    }

    /**
     * Expected types for object properties
     *
     *     return [
     *         'user' => User::class,
     *     ];
     *
     * @return array
     */
    private function expects()
    {
        return [];
    }

    /**
     * Update the current object with new values
     *
     * NOTE: Be careful not to violate immutability when using this method!
     *
     * @param array $data
     *
     * @return void
     *
     * @throws \DomainException If a data value is not of the expected type
     */
    private function apply(array $data)
    {
        $data    = array_intersect_key($data, get_object_vars($this));
        $types   = array_intersect_key($this->types(), $data);
        $expects = array_intersect_key($this->expects(), $data);

        foreach ($data as $key => $value) {
            if (null !== $value) {
                if (isset($types[$key])) {
                    settype($value, $types[$key]);
                }

                if (isset($expects[$key]) && false === $data[$key] instanceof $expects[$key]) {
                    throw new \DomainException(sprintf(
                        'Expected value of `%s` to be an object of `%s` type',
                        $key,
                        $expects[$key]
                    ));
                }
            }

            $this->$key = $value;
        }
    }

    /**
     * Check if the current object has a property
     *
     * @param string $key
     *
     * @return boolean
     */
    public function has($key)
    {
        return property_exists($this, $key);
    }

    /**
     * Get the current object values as an array
     *
     * @return array
     */
    public function toArray()
    {
        return get_object_vars($this);
    }

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
        throw new \RuntimeException(sprintf(
            'Modification of immutable object `%s` is not allowed',
            get_class($this)
        ));
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
    public function __unset($key)
    {
        throw new \RuntimeException(sprintf(
            'Modification of immutable object `%s` is not allowed',
            get_class($this)
        ));
    }
}
