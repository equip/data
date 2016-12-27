<?php

namespace Equip\Data\Traits;

use Cake\Chronos\Chronos;

trait DateAwareTrait
{
    /**
     * Get a date object for a property
     *
     * @param string $key
     *
     * @return Carbon
     */
    public function date($key)
    {
        return new Chronos($this->$key);
    }

    /**
     * Get a storage-friendly date string for a property
     *
     * @param string $key
     *
     * @return string
     */
    public function dateString($key)
    {
        return $this->date($key)->format('r');
    }
}
