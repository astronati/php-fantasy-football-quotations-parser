<?php

use PHPUnit\Framework\TestCase;
use FFQP\Map\Row\RedCardsNormalizer;

class RedCardsNormalizerTest extends TestCase
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
        $this->assertInternalType(
          'int',
          $redCards->normalize(
            $value,
            $this->getMockBuilder('FFQP\Map\Row\Row')->disableOriginalConstructor()->getMock(),
            'any_type'
          )
        );
        $this->assertSame(
          $result,
          $redCards->normalize(
            $value,
            $this->getMockBuilder('FFQP\Map\Row\Row')->disableOriginalConstructor()->getMock(),
            'any_type'
          )
        );
    }
}
