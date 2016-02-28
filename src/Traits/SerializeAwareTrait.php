<?php

namespace Equip\Data\Traits;

trait SerializeAwareTrait /* implements Serializable */
{
    /**
     * @see \Equip\Data\EntityInterface::toArray()
     *
     * @return array
     */
    abstract public function toArray();

    /**
     * @inheritDoc
     */
    public function serialize()
    {
        return serialize($this->toArray());
    }

    /**
     * @see \Equip\Data\Traits\ImmutableValueObjectTrait::apply()
     *
     * @inheritDoc
     */
    public function unserialize($data)
    {
        $this->apply(unserialize($data));
    }
}
