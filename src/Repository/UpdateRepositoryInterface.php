<?php

namespace Spark\Data\Repository;

interface UpdateRepositoryInterface
{
    /**
     * Update an object and return the updated version
     *
     * @param integer $id
     * @param array $values
     *
     * @return object
     */
    public function update($id, array $values);
}
