<?php

namespace Spark\Data\Traits;

use Spark\Data\ArraySerializableInterface;
use SplFixedArray;

trait ImmutableCollectionTrait
{
    /**
     * @var SplFixedArray
     */
    private $storage;

    /**
     * Hydrate the collection with new values
     *
     * @param array $values
     */
    public function __construct(array $values = [])
    {
        $this->store($values);
    }

    /**
     * Replace the current storage with new values
     *
     * NOTE: Be careful not to violate immutability when using this method!
     *
     * @param array $values
     *
     * @return void
     */
    private function store(array $values)
    {
        $this->storage = SplFixedArray::fromArray($values, false);
    }

    /**
     * Get a copy of the object with an added value
     *
     * @param mixed $value
     *
     * @return static
     */
    public function add($value)
    {
        $values = $this->storage->toArray();
        array_unshift($values, $value);

        $copy = clone $this;
        $copy->store($values);

        return $copy;
    }

    /**
     * Check if a value exists in the collection
     *
     * @param mixed $value
     *
     * @return boolean
     */
    public function has($value)
    {
        return in_array($value, $this->storage->toArray());
    }

    /**
     * Get the number of values in the collection
     *
     * @return integer
     */
    public function count()
    {
        return $this->storage->getSize();
    }

    /**
     * Get the current collection as an array
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
        }, $this->storage->toArray());
    }
}
