<?php

namespace Spark\Data;

interface CollectionInterface extends
    ArraySerializableInterface,
    \Countable,
    \JsonSerializable,
    \Serializable
{
    /**
     * Get a copy of the object with an added value
     *
     * @param mixed $value
     *
     * @return static
     */
    public function add($value);

    /**
     * Check if a value exists in the collection
     *
     * @param mixed $value
     *
     * @return boolean
     */
    public function has($value);
}
