<?php

use PHPUnit\Framework\TestCase;
use FFQP\Map\Row\MagicPointsNormalizer;

class MagicPointsNormalizerTest extends TestCase
{

    public function dataProvider()
    {
        return [
          ['', 0.0],
          ['-', 0.0],
          ['0', 0.0],
          [0, 0.0],
          [1, 1.0],
          [1.0, 1.0],
          ['1.0', 1.0],
          ['1', 1.0],
          ['5.5', 5.5],
          [5.5, 5.5],
        ];
    }

    /**
     * @dataProvider dataProvider
     * @param * $value
     * @param float $result
     */
    public function testNormalize($value, $result)
    {
        $magicPoints = new MagicPointsNormalizer();
        $this->assertInternalType(
          'float',
          $magicPoints->normalize(
            $value,
            $this->getMockBuilder('FFQP\Map\Row\Row')->disableOriginalConstructor()->getMock(),
            'any_type'
          )
        );
        $this->assertSame(
          $result,
          $magicPoints->normalize(
            $value,
            $this->getMockBuilder('FFQP\Map\Row\Row')->disableOriginalConstructor()->getMock(),
            'any_type'
          )
        );
    }
}
