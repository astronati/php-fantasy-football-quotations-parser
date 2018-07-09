<?php

namespace Tests\Map\Row\Normalizer\Field\Type;

use FFQP\Map\Row\Normalizer\Field\Type\PenaltiesMagicPointsNormalizer;
use FFQP\Parser\QuotationsParserFactory;
use PHPUnit\Framework\TestCase;

class PenaltiesMagicPointsNormalizerTest extends TestCase
{
    private function getNormalizerFieldsContainerInstance()
    {
        $instance = $this->getMockBuilder('FFQP\Map\Row\Normalizer\Field\NormalizedFieldsContainer')
          ->disableOriginalConstructor()
          ->setMethods(['get'])
          ->getMock();
        return $instance;
    }

    private function getRowDataInstance($role)
    {
        $instance = $this->getMockBuilder('FFQP\Map\Row\Row')->disableOriginalConstructor()->getMock();
        $instance->role = $role;
        return $instance;
    }

    public function dataProvider()
    {
        return [
          ['-', 'P', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2017, 0.0],
          ['-', 'P', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_WORLD_CUP_2018, 0.0],
          [0, 'P', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_WORLD_CUP_2018, 0.0],
          [0, 'D', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_WORLD_CUP_2018, 0.0],
          ['3', 'P', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_WORLD_CUP_2018, 3.0],
          ['3.0', 'D', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_WORLD_CUP_2018, 3.0],
        ];
    }

    /**
     * @dataProvider dataProvider
     * @param * $value
     * @param string $role
     * @param string $format
     * @param int $result
     */
    public function testNormalize($value, $role, $format, $result)
    {
        $normalizer = new PenaltiesMagicPointsNormalizer();
        $rowData = $this->getRowDataInstance($role);
        $this->assertInternalType('float', $normalizer->normalize($value, $rowData, $format, $this->getNormalizerFieldsContainerInstance()));
        $this->assertSame($result, $normalizer->normalize($value, $rowData, $format, $this->getNormalizerFieldsContainerInstance()));
    }
}
