<?php

namespace SparkTests\Data\Traits;

class SerializeAwareTest extends \PHPUnit_Framework_TestCase
{
    public function testSerialize()
    {
        $object = new SerializeAware;

        $object->id = 1;
        $object->name = 'Test Case';

        $frozen = serialize($object);

        $this->assertInternalType('string', $frozen);

        $thawed = unserialize($frozen);

        $this->assertNotSame($object, $thawed);

        $this->assertSame($object->id, $thawed->id);
        $this->assertSame($object->name, $thawed->name);
    }
}
