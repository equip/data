<?php

namespace SparkTests\Data\Traits;

use Spark\Data\Traits\JsonAwareTrait;

class JsonAware
{
    use JsonAwareTrait;

    public $id;
    public $name;

    public function toArray()
    {
        return get_object_vars($this);
    }
}
