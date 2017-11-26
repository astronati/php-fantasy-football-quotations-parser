<?php

use \FFQP\Row\Cell\VoteNormalizer as VoteNormalizer;

/**
 * @codeCoverageIgnore
 */
class VoteNormalizerTest extends PHPUnit_Framework_TestCase
{
    
    public function dataProvider()
    {
        return [
          ['S.V.', null, 'null'],
          ['0', null, 'null'],
          [0, null, 'null'],
          [0.5, 0.5, 'float'],
          ['0.5', 0.5, 'float'],
          ['0,5', 0.5, 'float'],
          [1, 1.0, 'float'],
          ['1', 1.0, 'float'],
        ];
    }
    
    /**
     * @dataProvider dataProvider
     * @param * $value
     * @param ?float $result
     * @param string $type
     */
    public function testNormalize($value, $result, $type)
    {
        $vote = new VoteNormalizer();
        $this->assertInternalType(
          $type,
          $vote->normalize($value, $this->getMockBuilder('\FFQP\Row\Data\RawData')->getMock())
        );
        $this->assertSame(
          $result,
          $vote->normalize($value, $this->getMockBuilder('\FFQP\Row\Data\RawData')->getMock())
        );
    }
}
