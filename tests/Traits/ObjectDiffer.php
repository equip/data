<?php

namespace SparkTests\Data\Traits;

use Spark\Data\Traits\DiffableTrait;

class ObjectDiffer
{
    use DiffableTrait {
        diff as public;
    }
}
