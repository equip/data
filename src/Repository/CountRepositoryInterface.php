<?php

namespace Equip\Data\Repository;

interface CountRepositoryInterface
{
    /**
     * Find record count by variable criteria
     *
     * @param array $criteria
     *
     * @return int
     */
    public function countBy(array $criteria);
}
