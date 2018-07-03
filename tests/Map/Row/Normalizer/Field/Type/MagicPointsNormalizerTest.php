<?php

use PHPUnit\Framework\TestCase;
use FFQP\Map\Row\Normalizer\Field\Type\MagicPointsNormalizer;

class MagicPointsNormalizerTest extends TestCase
{

    public function dataProvider()
    {
        return [
          ['', '0', null, 'null'],
          ['-', '0', null, 'null'],
          ['0', '0', null, 'null'],
          [0, '0', null, 'null'],
          [1, '0', 1.0, 'float'],
          [1.0, '0', 1.0, 'float'],
          [0, 'S.V.', null, 'null'],
          [5, 'S.V.', 5.0, 'float'],
          ['1.0', '0', 1.0, 'float'],
          ['1', '0', 1.0, 'float'],
          ['5.5', '0', 5.5, 'float'],
          [5.5, '0', 5.5, 'float'],
          [0, '5', 0.0, 'float'],
        ];
    }

    /**
     * @dataProvider dataProvider
     * @param * $value
     * @param * $vote
     * @param float $result
     * @param ?float $type
     */
    public function testNormalize($value, $vote, $result, $type)
    {
        $magicPoints = new MagicPointsNormalizer();
        $row = $this->getMockBuilder('FFQP\Map\Row\Row')->disableOriginalConstructor()->getMock();
        $row->vote = $vote;
        $this->assertInternalType($type, $magicPoints->normalize($value, $row, 'any_type'));
        $this->assertSame($result, $magicPoints->normalize($value, $row, 'any_type'));
    }
}
