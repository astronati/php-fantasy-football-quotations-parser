<?php

use \FFQP\Row\Cell\SecondaryRoleNormalizer as SecondaryRoleNormalizer;

/**
 * @codeCoverageIgnore
 */
class SecondaryRoleNormalizerTest extends PHPUnit_Framework_TestCase
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
     * @param ?float $result
     */
    public function testNormalize($value, $result)
    {
        $secondaryRole = new SecondaryRoleNormalizer();
        $this->assertInternalType(
          'string',
          $secondaryRole->normalize($value, $this->getMockBuilder('\FFQP\Row\Data\RawData')->getMock())
        );
        $this->assertSame(
          $result,
          $secondaryRole->normalize($value, $this->getMockBuilder('\FFQP\Row\Data\RawData')->getMock())
        );
    }
}
