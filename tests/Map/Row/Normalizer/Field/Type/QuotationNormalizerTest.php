<?php

use PHPUnit\Framework\TestCase;
use FFQP\Map\Row\Normalizer\Field\Type\QuotationNormalizer;

class QuotationNormalizerTest extends TestCase
{

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
        $quotation = new QuotationNormalizer();
        $this->assertInternalType(
          'int',
          $quotation->normalize(
            $value,
            $this->getMockBuilder('FFQP\Map\Row\Row')->disableOriginalConstructor()->getMock(),
            'any_type'
          )
        );
        $this->assertSame(
          $result,
          $quotation->normalize(
            $value,
            $this->getMockBuilder('FFQP\Map\Row\Row')->disableOriginalConstructor()->getMock(),
            'any_type'
          )
        );
    }
}
