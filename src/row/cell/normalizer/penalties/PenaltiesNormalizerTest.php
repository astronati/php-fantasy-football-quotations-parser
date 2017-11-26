<?php

use \FFQP\Row\Cell\PenaltiesNormalizer as PenaltiesNormalizer;

/**
 * @codeCoverageIgnore
 */
class PenaltiesNormalizerTest extends PHPUnit_Framework_TestCase
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
          $penalties->normalize($value, $this->getMockBuilder('\FFQP\Row\Data\RawData')->getMock())
        );
        $this->assertSame(
          $result,
          $penalties->normalize($value, $this->getMockBuilder('\FFQP\Row\Data\RawData')->getMock())
        );
    }
}
