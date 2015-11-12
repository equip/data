<?php

namespace SparkTests\Data\Traits;

use Spark\Data\ArraySerializableInterface;
use Spark\Data\Traits\ImmutableValueObjectTrait;

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
