<?php

namespace EquipTests\Data;

use Equip\Data\Traits\EntityTrait;
use Equip\Data\EntityInterface;

class Entity implements EntityInterface
{
    use EntityTrait;

    private $id;
    private $name;
    private $created_at;

    private function types()
    {
        return [
            'id'   => 'int',
            'name' => 'string',
        ];
    }
}
