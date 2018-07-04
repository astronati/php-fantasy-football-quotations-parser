<?php

use FFQP\Map\Row\Normalizer\Field\Type\QuotationNormalizer;
use PHPUnit\Framework\TestCase;

class QuotationNormalizerTest extends TestCase
{
    private function getNormalizerFieldsContainerInstance()
    {
        $instance = $this->getMockBuilder('FFQP\Map\Row\Normalizer\Field\NormalizedFieldsContainer')->disableOriginalConstructor()->getMock();
        return $instance;
    }

    public function dataProvider()
    {
        return [
          ['10', 10],
          [10, 10],
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
        $normalizer = new QuotationNormalizer();
        $this->assertInternalType(
          'int',
          $normalizer->normalize(
            $value,
            $this->getMockBuilder('FFQP\Map\Row\Row')->disableOriginalConstructor()->getMock(),
            'any_type',
            $this->getNormalizerFieldsContainerInstance()
          )
        );
        $this->assertSame(
          $result,
          $normalizer->normalize(
            $value,
            $this->getMockBuilder('FFQP\Map\Row\Row')->disableOriginalConstructor()->getMock(),
            'any_type',
            $this->getNormalizerFieldsContainerInstance()
          )
        );
    }
}
