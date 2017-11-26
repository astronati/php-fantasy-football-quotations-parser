<?php

use \FFQP\Row\Cell\RoleNormalizer as RoleNormalizer;

/**
 * @codeCoverageIgnore
 */
class RoleNormalizerTest extends PHPUnit_Framework_TestCase
{

    public function dataProvider()
    {
        return [
          ['P', 'P'],
          ['D', 'D'],
          ['C', 'C'],
          ['T', 'T'],
          ['A', 'A'],
        ];
    }

    /**
     * @dataProvider dataProvider
     * @param * $value
     * @param string $result
     */
    public function testNormalize($value, $result)
    {
        $role = new RoleNormalizer();
        $this->assertInternalType(
          'string',
          $role->normalize($value, $this->getMockBuilder('\FFQP\Row\Data\RawData')->getMock())
        );
        $this->assertSame(
          $result,
          $role->normalize($value, $this->getMockBuilder('\FFQP\Row\Data\RawData')->getMock())
        );
    }
}
