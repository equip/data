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
        $class = get_class($this);
        $new = new $class($values);
        return array_diff_assoc($new->toArray(), $this->toArray());
    }
}
