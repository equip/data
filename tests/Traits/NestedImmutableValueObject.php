<?php

namespace EquipTests\Data\Traits;

use Equip\Data\ArraySerializableInterface;
use Equip\Data\Traits\ImmutableValueObjectTrait;

class NestedImmutableValueObject implements ArraySerializableInterface
{
    use ImmutableValueObjectTrait;

    private $parent;

    private function expects()
    {
        return [
            'parent' => ImmutableValueObject::class,
        ];
    }
}
