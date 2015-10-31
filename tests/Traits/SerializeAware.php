<?php

namespace SparkTests\Data\Traits;

use Spark\Data\Traits\SerializeAwareTrait;

class SerializeAware
{
    use SerializeAwareTrait;

    public $id;
    public $name;

    private function apply(array $data)
    {
        foreach ($data as $key => $value) {
            $this->$key = $value;
        }
    }

    public function toArray()
    {
        return get_object_vars($this);
    }
}
