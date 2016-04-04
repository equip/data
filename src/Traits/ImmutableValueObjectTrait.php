<?php

namespace Equip\Data\Traits;

use Equip\Data\ArraySerializableInterface;
use RuntimeException;

trait ImmutableValueObjectTrait
{
    use ProtectedValueObjectTrait;

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
     * Validates the current object
     *
     * @return void
     *
     * @throws \DomainException If the object is not valid
     */
    private function validate()
    {
    }

    /**
     * Update the current object with new values
     *
     * NOTE: Be careful not to violate immutability when using this method!
     *
     * @uses types()
     * @uses expects()
     * @uses validate()
     *
     * @param array $data
     *
     * @return void
     *
     * @throws \DomainException If a data value is not of the expected type
     */
    private function apply(array $data)
    {
        // Discard any values that do not exist in this object
        $data = array_intersect_key($data, get_object_vars($this));

        // Type coercion and class expectations are not run on null values
        $values = array_filter($data, static function ($value) {
            return null !== $value;
        });

        $types   = array_intersect_key($this->types(), $values);
        $expects = array_intersect_key($this->expects(), $values);

        foreach ($types as $key => $type) {
            settype($data[$key], $type);
        }

        foreach ($expects as $key => $class) {
            if (false === $data[$key] instanceof $class) {
                throw new \DomainException(sprintf(
                    'Expected value of `%s` to be an object of `%s` type',
                    $key,
                    $class
                ));
            }
        }

        foreach ($data as $key => $value) {
            $this->$key = $value;
        }

        $this->validate();
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
        return array_map(static function ($value) {
            if ($value instanceof ArraySerializableInterface) {
                $value = $value->toArray();
            }
            return $value;
        }, get_object_vars($this));
    }
}
