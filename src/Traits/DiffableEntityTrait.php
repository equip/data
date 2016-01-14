<?php

namespace Equip\Data\Traits;

/**
 * Intended to be used by classes implementing Equip\Data\EntityInterface that
 * also need to implement Equip\Data\DiffableInterface.
 */
trait DiffableEntityTrait /* implements DiffableInterface */
{
    /**
     * @param array $values
     *
     * @return array
     */
    public function diff(array $values)
    {
        $copy = $this->withData($values);
        return array_diff_assoc($copy->toArray(), $this->toArray());
    }
}
