<?php

namespace Equip\Data\Mapper;

use Equip\Data\EntityInterface;
use Traversable;

interface MapperInterface
{
    /**
     * @param array|Traversable $rows
     *
     * @return EntityInterface[]
     */
    public function mapObjects($rows);

    /**
     * @param array $row
     *
     * @return EntityInterface
     */
    public function mapObject(array $row = []);
}
