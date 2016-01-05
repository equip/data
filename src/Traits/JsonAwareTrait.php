<?php

namespace Equip\Data\Traits;

trait JsonAwareTrait
{
    // JsonSerializable
    public function jsonSerialize()
    {
        return $this->toArray();
    }
}
