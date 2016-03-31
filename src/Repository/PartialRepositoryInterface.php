<?php

namespace Equip\Data\Repository;

use Equip\Data\EntityInterface;
use Traversable;

interface PartialRepositoryInterface
{
    /**
     * Returns the value of a single field for a single entity.
     *
     * @param int $id
     * @param string $field
     * @return mixed
     */
    public function findField($id, $field);

    /**
     * Returns the value of a single field for multiple entities.
     *
     * @param int[] $ids
     * @param string $field
     * @return Traversable
     */
    public function findFields(array $ids, $field);

    /**
     * Returns a single partially populated entity.
     *
     * @param int $id
     * @param string[] $fields
     * @return EntityInterface
     */
    public function findPartial($id, array $fields);

    /**
     * Returns multiple partially populated entities.
     *
     * @param int[] $ids
     * @param string[] $fields
     * @return EntityInterface[]|Traversable
     */
    public function findPartials(array $ids, array $fields);
}
