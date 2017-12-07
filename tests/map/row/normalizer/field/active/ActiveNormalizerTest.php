<?php

use PHPUnit\Framework\TestCase;
use FFQP\Map\Row\ActiveNormalizer;

class ActiveNormalizerTest extends TestCase
{

    public function dataProvider()
    {
        return [
          ['1', true],
          [1, true],
          ['0', false],
          [0, false],
          ['SI', true],
          ['NO', false],
        ];
    }

    /**
     * @dataProvider dataProvider
     * @param * $value
     * @param int $result
     */
    public function testNormalize($value, $result)
    {
        $active = new ActiveNormalizer();
        $this->assertSame(
          $result,
          $active->normalize(
            $value,
            $this->getMockBuilder('FFQP\Map\Row\Row')->disableOriginalConstructor()->getMock(),
            'any_format'
          )
        );
    }
}
