<?php

namespace SparkTests\Data\Traits;

use Spark\Data\ArraySerializableInterface;
use Spark\Data\Traits\ImmutableValueObjectTrait;

class TypelessImmutableValueObject implements ArraySerializableInterface
{
    use ImmutableValueObjectTrait;

    private $id;
    private $name;
}
