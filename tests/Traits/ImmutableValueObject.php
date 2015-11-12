<?php

namespace SparkTests\Data\Traits;

use Spark\Data\ArraySerializableInterface;
use Spark\Data\Traits\ImmutableValueObjectTrait;

class ImmutableValueObject implements ArraySerializableInterface
{
    use ImmutableValueObjectTrait;

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

    private function expects()
    {
        return [
            'created_at' => \DateTime::class,
        ];
    }

    private function validate()
    {
        if (!$this->name) {
            throw new \DomainException(
                'ImmutableValueObject requires a name'
            );
        }
    }
}
