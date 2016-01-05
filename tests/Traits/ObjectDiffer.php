<?php

namespace EquipTests\Data\Traits;

use Equip\Data\Traits\DiffableTrait;

class ObjectDiffer
{
    use DiffableTrait {
        diff as public;
    }
}
