<?php

namespace Spark\Data;

interface DiffableInterface
{
    /**
     * Find the difference between existing object values
     *
     * @param array $changes
     *
     * @return array
     */
    public function diff(array $values);
}
