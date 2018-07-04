<?php

use PHPUnit\Framework\TestCase;
use FFQP\Map\Row\Normalizer\Field\Type\CodeNormalizer;

class CodeNormalizerTest extends TestCase
{
    private function getNormalizerFieldsContainerInstance()
    {
        $instance = $this->getMockBuilder('FFQP\Map\Row\Normalizer\Field\NormalizedFieldsContainer')->disableOriginalConstructor()->getMock();
        return $instance;
    }

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
        $normalizer = new CodeNormalizer();
        $this->assertInternalType(
          'string',
          $normalizer->normalize(
            $value,
            $this->getMockBuilder('FFQP\Map\Row\Row')->disableOriginalConstructor()->getMock(),
            'any_format',
            $this->getNormalizerFieldsContainerInstance()
          )
        );
        $this->assertSame(
          $result,
          $normalizer->normalize(
            $value,
            $this->getMockBuilder('FFQP\Map\Row\Row')->disableOriginalConstructor()->getMock(),
            'any_format',
            $this->getNormalizerFieldsContainerInstance()
          )
        );
    }
}
