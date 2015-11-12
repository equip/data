<?php

namespace SparkTests\Data;

use Spark\Data\Collection;

class CollectionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var array
     */
    protected $values;

    /**
     * @var \Spark\Data\CollectionInterface
     */
    protected $collection;

    public function setUp()
    {
        $this->values = [
            'one',
            'two',
            'three',
        ];

        $this->collection = new Collection($this->values);
    }

    public function testImplements()
    {
        $this->assertInstanceOf('Spark\Data\CollectionInterface', $this->collection);
        $this->assertInstanceOf('Countable', $this->collection);
        $this->assertInstanceOf('JsonSerializable', $this->collection);
        $this->assertInstanceOf('Serializable', $this->collection);
    }

    public function testToArray()
    {
        $this->assertSame($this->values, $this->collection->toArray());
    }

    public function testJsonEncode()
    {
        $json = json_encode($this->collection);

        $this->assertJson($json);

        $this->assertSame($this->values, json_decode($json, true));
    }

    public function testSerialize()
    {
        $frozen = serialize($this->collection);

        $this->assertInternalType('string', $frozen);

        $thawed = unserialize($frozen);

        $this->assertInstanceOf(get_class($this->collection), $thawed);
        $this->assertNotSame($this->collection, $thawed);
        $this->assertSame($this->values, $thawed->toArray());
    }
}
