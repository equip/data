<?php

namespace SparkTests\Data\Traits;

use Spark\Data\Traits\ImmutableValueObjectTrait;

class TypelessImmutableValueObject
{
    use ImmutableValueObjectTrait;

    private $id;
    private $name;
}
