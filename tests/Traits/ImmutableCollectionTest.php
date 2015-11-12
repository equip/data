<?php

namespace SparkTests\Data\Traits;

class ImmutableCollectionTest extends \PHPUnit_Framework_TestCase
{
    public function testConstruction()
    {
        $collection = new ImmutableCollection([
            'a',
            'b',
            'c',
        ]);

        $this->assertTrue($collection->has('a'));
        $this->assertTrue($collection->has('b'));
        $this->assertTrue($collection->has('c'));
        $this->assertFalse($collection->has('d'));
    }

    public function testAddToCollection()
    {
        $collection = new ImmutableCollection;
        $modified   = $collection->add('bubble');

        $this->assertNotSame($collection, $modified);

        $this->assertFalse($collection->has('bubble'));
        $this->assertTrue($modified->has('bubble'));
    }

    public function testToArray()
    {
        $values = [
            'taco',
            'cake',
        ];

        $collection = new ImmutableCollection($values);

        $array = $collection->toArray();

        $this->assertSame($values, $array);
    }

    public function testCount()
    {
        $collection = new ImmutableCollection;

        $this->assertSame(0, count($collection));

        $collection = new ImmutableCollection([
            'tic',
            'tac',
        ]);

        $this->assertSame(2, count($collection));
    }

    public function testToArrayRecursion()
    {
        $values = [
            'Alice',
            'Ben',
            'Claire',
            'Dave',
        ];

        $collection = new ImmutableCollection(array_map(function ($name) {
            return new ImmutableValueObject(compact('name'));
        }, $values));

        $array = $collection->toArray();

        $this->assertCount(4, $array);

        $names = array_column($array, 'name');

        $this->assertSame($values, $names);
    }

    public function testKeysAreDiscarded()
    {
        $values = [
            'foo' => 'thing',
            'bar' => 'widget',
        ];

        $collection = new ImmutableCollection($values);

        $this->assertTrue($collection->has('thing'));
        $this->assertTrue($collection->has('widget'));

        $array = $collection->toArray();

        $this->assertSame($array, array_values($values));
    }
}
