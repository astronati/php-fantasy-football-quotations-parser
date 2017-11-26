<?php

use \FFQP\Row\Cell\MagicPointsNormalizer as MagicPointsNormalizer;

/**
 * @codeCoverageIgnore
 */
class MagicPointsNormalizerTest extends PHPUnit_Framework_TestCase
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
          ['5,5', 5.5],
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
          $magicPoints->normalize($value, $this->getMockBuilder('\FFQP\Row\Data\RawData')->getMock())
        );
        $this->assertSame(
          $result,
          $magicPoints->normalize($value, $this->getMockBuilder('\FFQP\Row\Data\RawData')->getMock())
        );
    }
}
