<?php

use PHPUnit\Framework\TestCase;
use FFQP\Map\Row\Normalizer\Field\AssistsNormalizer;

class AssistsNormalizerTest extends TestCase
{

    public function dataProvider()
    {
        return [
          ['10', 10],
          [10, 10],
          ['1', 1],
          [1, 1],
          [0, 0],
          ['0', 0],
        ];
    }

    /**
     * @dataProvider dataProvider
     * @param * $value
     * @param int $result
     */
    public function testNormalize($value, $result)
    {
        $assists = new AssistsNormalizer();
        $this->assertInternalType(
          'int',
          $assists->normalize(
            $value,
            $this->getMockBuilder('FFQP\Map\Row\Row')->disableOriginalConstructor()->getMock(),
            'any_format'
          )
        );
        $this->assertSame(
          $result,
          $assists->normalize(
            $value,
            $this->getMockBuilder('FFQP\Map\Row\Row')->disableOriginalConstructor()->getMock(),
            'any_format'
          )
        );
    }
}
