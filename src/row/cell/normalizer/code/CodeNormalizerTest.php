<?php

use \FFQP\Row\Cell\CodeNormalizer;

/**
 * @codeCoverageIgnore
 */
class CodeNormalizerTest extends PHPUnit_Framework_TestCase
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
          $code->normalize($value, $this->getMockBuilder('\FFQP\Row\Data\RowData')->getMock())
        );
        $this->assertSame(
          $result,
          $code->normalize($value, $this->getMockBuilder('\FFQP\Row\Data\RowData')->getMock())
        );
    }
}
