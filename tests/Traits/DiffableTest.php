<?php

namespace EquipTests\Data\Traits;

class DiffableTest extends \PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
        $this->object = new Diffable;
        $this->object->id = 42;
        $this->object->name = 'Life';
    }

    public function testDiff()
    {
        $differ = new ObjectDiffer;

        $changes = $differ->diff($this->object, [
            'id' => 42,
            'name' => 'World',
        ]);

        $this->assertSame(['name' => 'World'], $changes);

        $changes = $differ->diff($this->object, [
            'id' => 5,
        ]);

        $this->assertSame(['id' => 5], $changes);

        $changes = $differ->diff($this->object, $this->object->toArray());

        $this->assertEmpty($changes);
    }

    public function testEntityDiff()
    {
        $entity = new DiffableEntity([
            'id' => 99,
            'name' => 'Joe',
            'role' => 'admin',
        ]);

        $change = [
            'role' => 'user',
        ];
        $values = array_replace($entity->toArray(), $change);

        $this->assertSame($change, $entity->diff($values));
    }
}
