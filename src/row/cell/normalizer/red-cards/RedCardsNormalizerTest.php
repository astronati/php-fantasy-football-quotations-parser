<?php

use \FFQP\Row\Cell\RedCardsNormalizer as RedCardsNormalizer;

/**
 * @codeCoverageIgnore
 */
class RedCardsNormalizerTest extends PHPUnit_Framework_TestCase
{
    
    public function dataProvider()
    {
        return [
          ['-', 0],
          ['0', 0],
          [0, 0],
          [1, 1],
          [1.0, 1],
          ['1,0', 1],
          ['1.0', 1],
          ['1', 1],
        ];
    }
    
    /**
     * @dataProvider dataProvider
     * @param * $value
     * @param float $result
     */
    public function testNormalize($value, $result)
    {
        $redCards = new RedCardsNormalizer();
        $this->assertInternalType('int', $redCards->normalize($value, $this->getMockBuilder('\FFQP\Row\Data\RawData')->getMock()));
        $this->assertSame($result, $redCards->normalize($value, $this->getMockBuilder('\FFQP\Row\Data\RawData')->getMock()));
    }
}
