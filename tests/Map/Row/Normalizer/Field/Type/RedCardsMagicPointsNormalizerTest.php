<?php

namespace Tests\Map\Row\Normalizer\Field\Type;

use FFQP\Map\Row\Normalizer\Field\Type\RedCardsMagicPointsNormalizer;
use FFQP\Model\Quotation;
use FFQP\Parser\QuotationsParserFactory;
use PHPUnit\Framework\TestCase;

class RedCardsMagicPointsNormalizerTest extends TestCase
{
    private function getRedCardsNormalizer($value, $malus)
    {
        $instance = $this->getMockBuilder('FFQP\Map\Row\Normalizer\Field\Type\RedCardsNormalizer')
          ->disableOriginalConstructor()
          ->setMethods(['normalize'])
          ->getMock();
        $instance->method('normalize')->with($value)->willReturn($malus);
        return $instance;
    }

    private function getNormalizerFieldsContainerInstance($redCards, $malus)
    {
        $instance = $this->getMockBuilder('FFQP\Map\Row\Normalizer\Field\NormalizedFieldsContainer')
          ->disableOriginalConstructor()
          ->setMethods(['get'])
          ->getMock();

        $map = [
          [Quotation::RED_CARDS, $this->getRedCardsNormalizer($redCards, $malus)]
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
          ['-', 'P', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2017, 0, 0.0],
          ['-', 'D', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2017, 0, 0.0],
          ['0', 'P', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2017, 0, 0.0],
          ['0', 'D', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2017, 0, 0.0],
          [0, 'P', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2017, 0, 0.0],
          [0, 'D', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2017, 0, 0.0],
          ['-1', 'P', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2017, 1, -1.0],
          ['-1', 'D', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2017, 1, -1.0],
          ['-', 'P', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_WORLD_CUP_2018, 0, 0.0],
          ['-', 'D', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_WORLD_CUP_2018, 0, 0.0],
          ['0', 'P', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_WORLD_CUP_2018, 0, 0.0],
          ['0', 'D', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_WORLD_CUP_2018, 0, 0.0],
          [0, 'P', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_WORLD_CUP_2018, 0, 0.0],
          [0, 'D', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_WORLD_CUP_2018, 0, 0.0],
          ['1', 'P', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_WORLD_CUP_2018, 1, -1.0],
          ['1', 'D', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_WORLD_CUP_2018, 1, -1.0],
        ];
    }

    /**
     * @dataProvider dataProvider
     * @param * $value
     * @param string $role
     * @param string $format
     * @param float $malus
     * @param int $result
     */
    public function testNormalize($value, $role, $format, $malus, $result)
    {
        $normalizer = new RedCardsMagicPointsNormalizer();
        $rowData = $this->getRowDataInstance($role);
        $this->assertInternalType('float', $normalizer->normalize($value, $rowData, $format, $this->getNormalizerFieldsContainerInstance($value, $malus)));
        $this->assertSame($result, $normalizer->normalize($value, $rowData, $format, $this->getNormalizerFieldsContainerInstance($value, $malus)));
    }
}
