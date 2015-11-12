<?php

namespace SparkTests\Data\Traits;

use Spark\Data\ArraySerializableInterface;
use Spark\Data\Traits\ImmutableCollectionTrait;

class ImmutableCollection implements
    ArraySerializableInterface,
    \Countable
{
    use ImmutableCollectionTrait;
}
