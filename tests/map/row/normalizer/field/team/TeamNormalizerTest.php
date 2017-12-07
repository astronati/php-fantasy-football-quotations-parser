<?php

use PHPUnit\Framework\TestCase;
use FFQP\Map\Row\TeamNormalizer;

class TeamNormalizerTest extends TestCase
{

    public function dataProvider()
    {
        return [
          ['test', 'test'],
          ['0', '0'],
          [0.5, '0.5'],
        ];
    }

    /**
     * @dataProvider dataProvider
     * @param * $value
     * @param string $result
     */
    public function testNormalize($value, $result)
    {
        $team = new TeamNormalizer();
        $this->assertInternalType(
          'string',
          $team->normalize(
            $value,
            $this->getMockBuilder('FFQP\Map\Row\Row')->disableOriginalConstructor()->getMock(),
            'any_type'
          )
        );
        $this->assertSame(
          $result,
          $team->normalize(
            $value,
            $this->getMockBuilder('FFQP\Map\Row\Row')->disableOriginalConstructor()->getMock(),
            'any_type'
          )
        );
    }
}
