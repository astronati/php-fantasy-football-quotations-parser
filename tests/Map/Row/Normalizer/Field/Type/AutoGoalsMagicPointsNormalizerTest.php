<?php

namespace Tests\Map\Row\Normalizer\Field\Type;

use FFQP\Map\Row\Normalizer\Field\Type\AutoGoalsMagicPointsNormalizer;
use FFQP\Model\Quotation;
use PHPUnit\Framework\TestCase;
use FFQP\Parser\QuotationsParserFactory;

class AutoGoalsMagicPointsNormalizerTest extends TestCase
{
    private function getAutoGoalsNormalizer($value, $autoGoalsNumber)
    {
        $instance = $this->getMockBuilder('FFQP\Map\Row\Normalizer\Field\Type\AutoGoalsMagicPointsNormalizer')
          ->disableOriginalConstructor()
          ->setMethods(['normalize'])
          ->getMock();
        $instance->method('normalize')->with($value)->willReturn($autoGoalsNumber);
        return $instance;
    }

    private function getNormalizerFieldsContainerInstance($value, $autoGoalsNumber)
    {
        $instance = $this->getMockBuilder('FFQP\Map\Row\Normalizer\Field\NormalizedFieldsContainer')
          ->disableOriginalConstructor()
          ->setMethods(['get'])
          ->getMock();

        $map = [
          [Quotation::AUTO_GOALS, $this->getAutoGoalsNormalizer($value, $autoGoalsNumber)]
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
          ['-2.0', 'P', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2017, 2, -2.0],
          ['-2.0', 'D', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2017, 1, -2.0],
          ['-2,0', 'D', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2017, 1, -2.0],
          ['-', 'P', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_WORLD_CUP_2018, 0, 0.0],
          ['-', 'D', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_WORLD_CUP_2018, 0, 0.0],
          ['0', 'P', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_WORLD_CUP_2018, 0, 0.0],
          ['0', 'D', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_WORLD_CUP_2018, 0, 0.0],
          [0, 'P', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_WORLD_CUP_2018, 0, 0.0],
          [0, 'D', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_WORLD_CUP_2018, 0, 0.0],
          ['2', 'P', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_WORLD_CUP_2018, 2, -2.0],
          ['2', 'D', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_WORLD_CUP_2018, 2, -4.0],
        ];
    }

    /**
     * @dataProvider dataProvider
     * @param * $value
     * @param string $role
     * @param string $format
     * @param int $autoGoalsNumber
     * @param int $result
     */
    public function testNormalize($value, $role, $format, $autoGoalsNumber, $result)
    {
        $normalizer = new AutoGoalsMagicPointsNormalizer();
        $rowData = $this->getRowDataInstance($role);
        $this->assertInternalType('float', $normalizer->normalize($value, $rowData, $format, $this->getNormalizerFieldsContainerInstance($value, $autoGoalsNumber)));
        $this->assertSame($result, $normalizer->normalize($value, $rowData, $format, $this->getNormalizerFieldsContainerInstance($value, $autoGoalsNumber)));
    }
}
