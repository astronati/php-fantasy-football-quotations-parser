<?php

namespace Tests\Map\Row\Normalizer\Field\Type;

use FFQP\Map\Row\Normalizer\Field\Type\PenaltiesNormalizer;
use FFQP\Model\Quotation;
use FFQP\Parser\QuotationsParserFactory;
use PHPUnit\Framework\TestCase;

class PenaltiesNormalizerTest extends TestCase
{
    private function getPenaltiesMagicPointsNormalizer($value)
    {
        $instance = $this->getMockBuilder('FFQP\Map\Row\Normalizer\Field\Type\PenaltiesMagicPointsNormalizer')
          ->disableOriginalConstructor()
          ->setMethods(['normalize'])
          ->getMock();
        $instance->method('normalize')->with($value)->willReturn((float) $value);
        return $instance;
    }

    private function getNormalizerFieldsContainerInstance($value)
    {
        $instance = $this->getMockBuilder('FFQP\Map\Row\Normalizer\Field\NormalizedFieldsContainer')
          ->disableOriginalConstructor()
          ->setMethods(['get'])
          ->getMock();

        $map = [
          [Quotation::PENALTIES_MAGIC_POINTS, $this->getPenaltiesMagicPointsNormalizer($value)]
        ];
        $instance->method('get')->willReturnMap($map);

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
          ['-', 'P', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2017, 0],
          ['-', 'D', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2017, 0],
          ['0', 'P', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2017, 0],
          ['0', 'D', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2017, 0],
          [0, 'P', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2017, 0],
          [0, 'D', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2017, 0],
          ['3.0', 'P', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2017, 1],
          ['-3.0', 'D', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2017, 1],
          ['-3,0', 'D', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2017, 1],
          ['-', 'P', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_WORLD_CUP_2018, 0],
          ['-', 'D', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_WORLD_CUP_2018, 0],
          ['0', 'P', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_WORLD_CUP_2018, 0],
          ['0', 'D', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_WORLD_CUP_2018, 0],
          [0, 'P', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_WORLD_CUP_2018, 0],
          [0, 'D', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_WORLD_CUP_2018, 0],
          ['3', 'P', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_WORLD_CUP_2018, 1],
          ['-3', 'D', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_WORLD_CUP_2018, 1],
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
        $normalizer = new PenaltiesNormalizer();
        $rowData = $this->getRowDataInstance($role);
        $this->assertInternalType('int', $normalizer->normalize($value, $rowData, $format, $this->getNormalizerFieldsContainerInstance($value)));
        $this->assertSame($result, $normalizer->normalize($value, $rowData, $format, $this->getNormalizerFieldsContainerInstance($value)));
    }
}
