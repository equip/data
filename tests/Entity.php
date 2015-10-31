<?php

namespace SparkTests\Data;

use Spark\Data\Traits\EntityTrait;
use Spark\Data\EntityInterface;

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
