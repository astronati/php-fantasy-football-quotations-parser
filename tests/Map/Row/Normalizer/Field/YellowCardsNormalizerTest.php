<?php

use PHPUnit\Framework\TestCase;
use FFQP\Map\Row\Normalizer\Field\YellowCardsNormalizer;

class YellowCardsNormalizerTest extends TestCase
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
          $yellowCards->normalize(
            $value,
            $this->getMockBuilder('FFQP\Map\Row\Row')->disableOriginalConstructor()->getMock(),
            'any_type'
          )
        );
        $this->assertSame(
          $result,
          $yellowCards->normalize($value,
            $this->getMockBuilder('FFQP\Map\Row\Row')->disableOriginalConstructor()->getMock(),
            'any_type'
          )
        );
    }
}
