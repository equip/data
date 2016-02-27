<?php

namespace Equip\Data;

interface DiffableInterface
{
    /**
     * Find the difference between existing object values
     *
     * @param array $values
     *
     * @return array
     */
    public function diff(array $values);
}
