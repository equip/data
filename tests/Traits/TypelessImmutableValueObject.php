<?php

namespace EquipTests\Data\Traits;

use Equip\Data\ArraySerializableInterface;
use Equip\Data\Traits\ImmutableValueObjectTrait;

class TypelessImmutableValueObject implements ArraySerializableInterface
{
    use ImmutableValueObjectTrait;

    private $id;
    private $name;
}
