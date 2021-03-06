<?php

use PHPUnit\Framework\TestCase;
use FFQP\Map\Row\Normalizer\Field\Type\AssistsMagicPointsNormalizer;

class AssistsMagicPointsNormalizerTest extends TestCase
{
    private function getNormalizerFieldsContainerInstance()
    {
        $instance = $this->getMockBuilder('FFQP\Map\Row\Normalizer\Field\NormalizedFieldsContainer')->disableOriginalConstructor()->getMock();
        return $instance;
    }

    public function dataProvider()
    {
        return [
          ['10', 10.0],
          [10, 10.0],
          ['1', 1.0],
          [1, 1.0],
          [0, 0.0],
          ['0', 0.0],
        ];
    }

    /**
     * @dataProvider dataProvider
     * @param * $value
     * @param int $result
     */
    public function testNormalize($value, $result)
    {
        $normalizer = new AssistsMagicPointsNormalizer();
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
