<?php

namespace EquipTests\Data\Traits;

use Equip\Data\Traits\JsonAwareTrait;

class JsonAware
{
    use JsonAwareTrait;

    public $id;
    public $name;

    public function toArray()
    {
        return get_object_vars($this);
    }
}
