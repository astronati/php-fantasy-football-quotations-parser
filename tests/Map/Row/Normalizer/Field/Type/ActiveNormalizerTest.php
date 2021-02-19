<?php

use PHPUnit\Framework\TestCase;
use FFQP\Map\Row\Normalizer\Field\Type\ActiveNormalizer;

class ActiveNormalizerTest extends TestCase
{
    private function getNormalizerFieldsContainerInstance()
    {
        $instance = $this->getMockBuilder('FFQP\Map\Row\Normalizer\Field\NormalizedFieldsContainer')->disableOriginalConstructor()->getMock();
        return $instance;
    }

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
        $normalizer = new ActiveNormalizer();
        $this->assertSame(
          $result,
          $normalizer->normalize(
            $value,
            $this->getMockBuilder('FFQP\Map\Row\Row')->disableOriginalConstructor()->getMock(),
            1,
            $this->getNormalizerFieldsContainerInstance()
          )
        );
    }
}
