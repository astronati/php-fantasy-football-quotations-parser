<?php

use PHPUnit\Framework\TestCase;
use FFQP\Map\Row\Normalizer\Field\CodeNormalizer;

class CodeNormalizerTest extends TestCase
{

    public function dataProvider()
    {
        return [
          ['test', 'test'],
          ['0', '0'],
          [123, '123'],
          ['123', '123'],
        ];
    }

    /**
     * @dataProvider dataProvider
     * @param * $value
     * @param string $result
     */
    public function testNormalize($value, $result)
    {
        $code = new CodeNormalizer();
        $this->assertInternalType(
          'string',
          $code->normalize(
            $value,
            $this->getMockBuilder('FFQP\Map\Row\Row')->disableOriginalConstructor()->getMock(),
            'any_format'
          )
        );
        $this->assertSame(
          $result,
          $code->normalize(
            $value,
            $this->getMockBuilder('FFQP\Map\Row\Row')->disableOriginalConstructor()->getMock(),
            'any_format'
          )
        );
    }
}
