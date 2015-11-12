<?php

namespace Spark\Data\Traits;

trait CollectionTrait
{
    use ImmutableCollectionTrait;
    use JsonAwareTrait;
    use SerializeAwareTrait;

    // Serializable
    public function unserialize($data)
    {
        $this->store(unserialize($data));
    }
}
