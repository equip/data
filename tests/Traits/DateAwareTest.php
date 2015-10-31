<?php

namespace SparkTests\Data\Traits;

class DateAwareTest extends \PHPUnit_Framework_TestCase
{
    public function testDate()
    {
        $object = new DateAware;
        $object->at = '2015-10-30 15:05:00';

        $date = $object->date('at');

        $this->assertInstanceOf('Carbon\Carbon', $date);
    }
}
