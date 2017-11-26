<?php

use \FFQP\Row\Cell\YellowCardsNormalizer as YellowCardsNormalizer;

/**
 * @codeCoverageIgnore
 */
class YellowCardsNormalizerTest extends PHPUnit_Framework_TestCase
{
    
    public function dataProvider()
    {
        return array(
          array('-', 0),
          array('0', 0),
          array(0, 0),
          array(0.5, 1),
          array(-0.5, 1),
          array('0.5', 1),
          array('-0.5', 1),
          array('0,5', 1),
          array('-0,5', 1),
          array(1, 2),
          array(-1, 2),
          array('1', 2),
          array('-1', 2),
        );
    }
    
    /**
     * @dataProvider dataProvider
     * @param * $value
     * @param float $result
     */
    public function testNormalize($value, $result)
    {
        $yellowCards = new YellowCardsNormalizer();
        $this->assertInternalType('int', $yellowCards->normalize($value, $this->getMockBuilder('\FFQP\Row\Data\RawData')->getMock()));
        $this->assertSame($result, $yellowCards->normalize($value, $this->getMockBuilder('\FFQP\Row\Data\RawData')->getMock()));
    }
}
