<?php

namespace SparkTests\Data\Traits;

class ImmutableValueObjectTest extends \PHPUnit_Framework_TestCase
{
    public function testConstruction()
    {
        $date = new \DateTime;
        $data = [
            'id'         => 1,
            'name'       => 'Jonny Jones',
            'created_at' => $date,
        ];

        $object = new ImmutableValueObject($data);

        $this->assertSame($data, $object->toArray());

        foreach (array_keys($data) as $key) {
            $this->assertTrue($object->has($key));
            $this->assertSame($data[$key], $object->$key);
        }
    }

    public function testConstructionWithUndefinedProps()
    {
        $data = [
            'id'   => 2,
            'skip' => true,
        ];

        $object = new ImmutableValueObject($data);

        $this->assertNotSame($data, $object->toArray());

        $this->assertTrue($object->has('id'));
        $this->assertTrue($object->has('name'));
        $this->assertFalse($object->has('skip'));
    }

    public function testConstructionSetsType()
    {
        $data = [
            'id' => '10',
            'name' => 1337,
        ];

        $object = new ImmutableValueObject($data);

        $this->assertNotSame($data, $object->toArray());

        $this->assertSame(10, $object->id);
        $this->assertSame('1337', $object->name);

        // Without type coercion, input data is exactly the same
        $object = new TypelessImmutableValueObject($data);

        $this->assertSame($data, $object->toArray());
    }

    /**
     * @expectedException \DomainException
     * @expectedExceptionMessageRegExp /expected value of .* to be an object of .* type/i
     */
    public function testConstructionWithExpectationFaiure()
    {
        $data = [
            'created_at' => new \stdClass,
        ];

        $object = new ImmutableValueObject($data);
    }

    /**
     * @expectedException \RuntimeException
     * @expectedExceptionMessageRegExp /modification of immutable object .* not allowed/i
     */
    public function testSetThrowsException()
    {
        $object = new ImmutableValueObject();
        $object->id = 5;
    }

    /**
     * @expectedException \RuntimeException
     * @expectedExceptionMessageRegExp /modification of immutable object .* not allowed/i
     */
    public function testUnsetThrowsException()
    {
        $object = new ImmutableValueObject(['id' => 5]);
        unset($object->id);
    }

    public function testPropertyIsSet()
    {
        $object = new ImmutableValueObject;

        $this->assertFalse(isset($object->id));

        $object = new ImmutableValueObject(['id' => 3]);

        $this->assertTrue(isset($object->id));
        $this->assertFalse(isset($object->name));
    }

    public function testWithData()
    {
        $data = [
            'id'   => 1,
            'name' => 'Jonny Jones',
        ];

        $object = new ImmutableValueObject($data);
        $copied = $object->withData(['name' => 'JJ']);

        $this->assertNotSame($object, $copied);

        $this->assertSame('Jonny Jones', $object->name);
        $this->assertSame('JJ', $copied->name);
    }
}
