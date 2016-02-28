<?php

namespace EquipTests\Data\Traits;

use Equip\Data\DiffableInterface;
use Equip\Data\Traits\DiffableEntityTrait;
use Equip\Data\Traits\EntityTrait;

class DiffableEntity implements DiffableInterface
{
    use DiffableEntityTrait;
    use EntityTrait;

    private $id;
    private $name;
    private $role;
}
