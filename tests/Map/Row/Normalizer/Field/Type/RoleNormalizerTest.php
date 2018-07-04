<?php

use PHPUnit\Framework\TestCase;
use FFQP\Map\Row\Normalizer\Field\Type\RoleNormalizer;

class RoleNormalizerTest extends TestCase
{
    private function getNormalizerFieldsContainerInstance()
    {
        $instance = $this->getMockBuilder('FFQP\Map\Row\Normalizer\Field\NormalizedFieldsContainer')->disableOriginalConstructor()->getMock();
        return $instance;
    }

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
        $normalizer = new RoleNormalizer();
        $this->assertInternalType(
          'string',
          $normalizer->normalize(
            $value,
            $this->getMockBuilder('FFQP\Map\Row\Row')->disableOriginalConstructor()->getMock(),
            'any_type',
            $this->getNormalizerFieldsContainerInstance()
          )
        );
        $this->assertSame(
          $result,
          $normalizer->normalize(
            $value,
            $this->getMockBuilder('FFQP\Map\Row\Row')->disableOriginalConstructor()->getMock(),
            'any_type',
            $this->getNormalizerFieldsContainerInstance()
          )
        );
    }
}
