<?php

namespace SparkTests\Data\Traits;

use Spark\Data\Traits\ImmutableValueObjectTrait;

class ImmutableValueObject
{
    use ImmutableValueObjectTrait;

    private $id;
    private $name;

    private function types()
    {
        return [
            'id'   => 'int',
            'name' => 'string',
        ];
    }
}
