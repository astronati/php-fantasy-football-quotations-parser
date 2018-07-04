<?php

namespace Tests\Map\Row\Normalizer\Field\Type;

use FFQP\Model\Quotation;
use PHPUnit\Framework\TestCase;
use FFQP\Map\Row\Normalizer\Field\Type\AutoGoalsNormalizer;
use FFQP\Parser\QuotationsParserFactory;

class AutoGoalsNormalizerTest extends TestCase
{
    private function getAutoGoalsMagicPointsNormalizer($autoGoals, $malus)
    {
        $instance = $this->getMockBuilder('FFQP\Map\Row\Normalizer\Field\Type\AutoGoalsMagicPointsNormalizer')
          ->disableOriginalConstructor()
          ->setMethods(['normalize'])
          ->getMock();
        $instance->method('normalize')->with($autoGoals)->willReturn($malus);
        return $instance;
    }

    private function getNormalizerFieldsContainerInstance($autoGoals, $malus)
    {
        $instance = $this->getMockBuilder('FFQP\Map\Row\Normalizer\Field\NormalizedFieldsContainer')
          ->disableOriginalConstructor()
          ->setMethods(['get'])
          ->getMock();

        $map = [
          [Quotation::AUTO_GOALS_MAGIC_POINTS, $this->getAutoGoalsMagicPointsNormalizer($autoGoals, $malus)]
        ];
        $instance->method('get')->willReturnMap($map);

        return $instance;
    }

    private function getRowDataInstance($role, $autoGoals)
    {
        $instance = $this->getMockBuilder('FFQP\Map\Row\Row')->disableOriginalConstructor()->getMock();
        $instance->role = $role;
        $instance->autoGoals = $autoGoals;
        return $instance;
    }

    public function dataProvider()
    {
        return [
          ['-', 'P', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2017, 0.0, 0],
          ['-', 'D', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2017, 0.0, 0],
          ['0', 'P', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2017, 0.0, 0],
          ['0', 'D', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2017, 0.0, 0],
          [0, 'P', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2017, 0.0, 0],
          [0, 'D', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2017, 0.0, 0],
          ['-2.0', 'P', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2017, -2.0, 2],
          ['-2.0', 'D', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2017, -2.0, 1],
          ['-2,0', 'D', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2017, -2.0, 1],
          ['-', 'P', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_WORLD_CUP_2018, 0.0, 0],
          ['-', 'D', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_WORLD_CUP_2018, 0.0, 0],
          ['0', 'P', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_WORLD_CUP_2018, 0.0, 0],
          ['0', 'D', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_WORLD_CUP_2018, 0.0, 0],
          [0, 'P', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_WORLD_CUP_2018, 0.0, 0],
          [0, 'D', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_WORLD_CUP_2018, 0.0, 0],
          ['2', 'P', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_WORLD_CUP_2018, 0.0, 2],
          ['2', 'D', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_WORLD_CUP_2018, 0.0, 2],
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
        $autoGoals = new AutoGoalsNormalizer();
        $rowData = $this->getRowDataInstance($role, $value);
        $this->assertInternalType('int', $autoGoals->normalize($value, $rowData, $format, $this->getNormalizerFieldsContainerInstance($value, $malus)));
        $this->assertSame($result, $autoGoals->normalize($value, $rowData, $format, $this->getNormalizerFieldsContainerInstance($value, $malus)));
    }
}
