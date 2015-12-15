<?php

namespace Spark\Data\Traits;

use Spark\Data\DiffableInterface;

trait DiffableTrait
{
    /**
     * Get the difference between an object and some values
     *
     * @param DiffableInterface $object
     * @param array $values
     *
     * @return array
     */
    private function diff(DiffableInterface $object, array $values)
    {
        return $object->diff($values);
    }
}
