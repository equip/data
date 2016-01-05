<?php

namespace Equip\Data\Repository;

interface CreateRepositoryInterface
{
    /**
     * Create a new object and return it
     *
     * @param array $values
     *
     * @return object
     */
    public function create(array $values);
}
