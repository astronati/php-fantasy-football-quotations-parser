<?php

use PHPUnit\Framework\TestCase;
use FFQP\Map\Row\SecondaryRoleNormalizer;

class SecondaryRoleNormalizerTest extends TestCase
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
          $secondaryRole->normalize(
            $value,
            $this->getMockBuilder('FFQP\Map\Row\Row')->disableOriginalConstructor()->getMock(),
            'any_type'
          )
        );
        $this->assertSame(
          $result,
          $secondaryRole->normalize(
            $value,
            $this->getMockBuilder('FFQP\Map\Row\Row')->disableOriginalConstructor()->getMock(),
            'any_type'
          )
        );
    }
}
