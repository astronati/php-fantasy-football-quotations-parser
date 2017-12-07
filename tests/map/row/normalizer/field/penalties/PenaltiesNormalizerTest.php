<?php

use PHPUnit\Framework\TestCase;
use FFQP\Map\Row\PenaltiesNormalizer;

class PenaltiesNormalizerTest extends TestCase
{

    public function dataProvider()
    {
        return [
          ['3,0', 1],
          [3.0, 1],
          ['3.0', 1],
          ['3,0', 1],
          ['-3.0', 1],
          [-3.0, 1],
          [0, 0],
          ['0', 0],
        ];
    }

    /**
     * @dataProvider dataProvider
     * @param * $value
     * @param int $result
     */
    public function testNormalize($value, $result)
    {
        $penalties = new PenaltiesNormalizer();
        $this->assertInternalType(
          'int',
          $penalties->normalize(
            $value,
            $this->getMockBuilder('FFQP\Map\Row\Row')->disableOriginalConstructor()->getMock(),
            'any_type'
          )
        );
        $this->assertSame(
          $result,
          $penalties->normalize(
            $value,
            $this->getMockBuilder('FFQP\Map\Row\Row')->disableOriginalConstructor()->getMock(),
            'any_type'
          )
        );
    }
}
