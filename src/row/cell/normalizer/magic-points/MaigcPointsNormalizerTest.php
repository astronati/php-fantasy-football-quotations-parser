<?php

use \FFQP\Row\Cell\MagicPointsNormalizer as MagicPointsNormalizer;

/**
 * @codeCoverageIgnore
 */
class MagicPointsNormalizerTest extends PHPUnit_Framework_TestCase
{
    
    public function dataProvider()
    {
        return array(
          array('', 0.0),
          array('-', 0.0),
          array('0', 0.0),
          array(0, 0.0),
          array(1, 1.0),
          array(1.0, 1.0),
          array('1.0', 1.0),
          array('1', 1.0),
          array('5,5', 5.5),
          array('5.5', 5.5),
          array(5.5, 5.5),
        );
    }
    
    /**
     * @dataProvider dataProvider
     * @param * $value
     * @param float $result
     */
    public function testNormalize($value, $result)
    {
        $magicPoints = new MagicPointsNormalizer();
        $this->assertInternalType('float', $magicPoints->normalize($value, $this->getMockBuilder('\FFQP\Row\Data\RawData')->getMock()));
        $this->assertSame($result, $magicPoints->normalize($value, $this->getMockBuilder('\FFQP\Row\Data\RawData')->getMock()));
    }
}
