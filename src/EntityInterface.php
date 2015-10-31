<?php

namespace Spark\Data;

interface EntityInterface extends
    \JsonSerializable,
    \Serializable
{
    /**
     * Check if a property exists in this entity
     *
     * @param string $key
     *
     * @return boolean
     */
    public function has($key);

    /**
     * Get a copy of the entity and replace data
     *
     * @param array $data
     *
     * @return static
     */
    public function withData(array $data);

    /**
     * Get the values of the entity as an array
     *
     * @return array
     */
    public function toArray();
}
