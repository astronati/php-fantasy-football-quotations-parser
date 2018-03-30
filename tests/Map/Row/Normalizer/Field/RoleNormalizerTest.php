<?php

use PHPUnit\Framework\TestCase;
use FFQP\Map\Row\Normalizer\Field\RoleNormalizer;

class RoleNormalizerTest extends TestCase
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
          $role->normalize(
            $value,
            $this->getMockBuilder('FFQP\Map\Row\Row')->disableOriginalConstructor()->getMock(),
            'any_type'
          )
        );
        $this->assertSame(
          $result,
          $role->normalize(
            $value,
            $this->getMockBuilder('FFQP\Map\Row\Row')->disableOriginalConstructor()->getMock(),
            'any_type'
          )
        );
    }
}
