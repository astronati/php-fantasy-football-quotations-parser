<?php

use \FFQP\Row\Cell\YellowCardsNormalizer;

/**
 * @codeCoverageIgnore
 */
class YellowCardsNormalizerTest extends PHPUnit_Framework_TestCase
{

    public function dataProvider()
    {
        return [
          ['-', 0],
          ['0', 0],
          [0, 0],
          [0.5, 1],
          [-0.5, 1],
          ['0.5', 1],
          ['-0.5', 1],
          ['0,5', 1],
          ['-0,5', 1],
          [1, 2],
          [-1, 2],
          ['1', 2],
          ['-1', 2],
        ];
    }

    /**
     * @dataProvider dataProvider
     * @param * $value
     * @param float $result
     */
    public function testNormalize($value, $result)
    {
        $yellowCards = new YellowCardsNormalizer();
        $this->assertInternalType(
          'int',
          $yellowCards->normalize($value, $this->getMockBuilder('\FFQP\Row\Data\RowData')->getMock())
        );
        $this->assertSame(
          $result,
          $yellowCards->normalize($value, $this->getMockBuilder('\FFQP\Row\Data\RowData')->getMock())
        );
    }
}
