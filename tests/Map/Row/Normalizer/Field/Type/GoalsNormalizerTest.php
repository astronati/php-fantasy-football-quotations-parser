<?php

namespace Tests\Map\Row\Normalizer\Field\Type;

use FFQP\Map\Row\Normalizer\Field\Type\GoalsNormalizer;
use FFQP\Model\Quotation;
use FFQP\Parser\QuotationsParserFactory;
use PHPUnit\Framework\TestCase;

class GoalsNormalizerTest extends TestCase
{
    private function getGoalsMagicPointsNormalizer($goals, $bonus)
    {
        $instance = $this->getMockBuilder('FFQP\Map\Row\Normalizer\Field\Type\GoalsMagicPointsNormalizer')
          ->disableOriginalConstructor()
          ->setMethods(['normalize'])
          ->getMock();
        $instance->method('normalize')->with($goals)->willReturn($bonus);
        return $instance;
    }

    private function getNormalizerFieldsContainerInstance($goals, $bonus)
    {
        $instance = $this->getMockBuilder('FFQP\Map\Row\Normalizer\Field\NormalizedFieldsContainer')
          ->disableOriginalConstructor()
          ->setMethods(['get'])
          ->getMock();

        $map = [
          [Quotation::GOALS_MAGIC_POINTS, $this->getGoalsMagicPointsNormalizer($goals, $bonus)]
        ];
        $instance->method('get')->willReturnMap($map);

        return $instance;
    }

    private function getRowDataInstance($role, $goals)
    {
        $instance = $this->getMockBuilder('FFQP\Map\Row\Row')->disableOriginalConstructor()->getMock();
        $instance->role = $role;
        $instance->goals = $goals;
        return $instance;
    }

    public function dataProvider()
    {
        return [
          ['-', 'P', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2017, 0.0, 0],
          ['0', 'P', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2017, 0.0, 0],
          ['0.0', 'P', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2017, 0.0, 0],
          ['0,0', 'P', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2017, 0.0, 0],
          [0, 'P', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2017, 0.0, 0],
          ['-3.0', 'P', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2017, -30.0, 3],
          ['9.0', 'D', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2017, 9.0, 2],
          ['8.0', 'C', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2017, 8.0, 2],
          ['7.0', 'T', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2017, 7.0, 2],
          ['6.0', 'A', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2017, 6.0, 2],
          ['-', 'P', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_WORLD_CUP_2018, 0.0, 0],
          ['0', 'P', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_WORLD_CUP_2018, 0.0, 0],
          ['0.0', 'P', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_WORLD_CUP_2018, 0.0, 0],
          ['0,0', 'P', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_WORLD_CUP_2018, 0.0, 0],
          [0, 'P', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_WORLD_CUP_2018, 0.0, 0],
          ['-3', 'P', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_WORLD_CUP_2018, -3.0, 3],
          ['3', 'D', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_WORLD_CUP_2018, 13.5, 3],
          ['2', 'C', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_WORLD_CUP_2018, 8.0, 2],
          ['2', 'T', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_WORLD_CUP_2018, 7.5, 2],
          ['2', 'A', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_WORLD_CUP_2018, 6.0, 2],
          ['-', 'P', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2015, 0.0, 0],
          ['0', 'P', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2015, 0.0, 0],
          ['0.0', 'P', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2015, 0.0, 0],
          ['0,0', 'P', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2015, 0.0, 0],
          [0, 'P', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2015, 0.0, 0],
          ['-3.0', 'P', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2015, -3.0, 3],
          ['6.0', 'D', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2015, 6.0, 2],
          ['6.0', 'C', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2015, 6.0, 2],
          ['6.0', 'A', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2015, 6.0, 2],
        ];
    }

    /**
     * @dataProvider dataProvider
     * @param * $value
     * @param string $role
     * @param string $format
     * @param float $bonus
     * @param int $result
     */
    public function testNormalize($value, $role, $format, $bonus, $result)
    {
        $normalizer = new GoalsNormalizer();
        $rowData = $this->getRowDataInstance($role, $value);
        $this->assertInternalType('int', $normalizer->normalize($value, $rowData, $format, $this->getNormalizerFieldsContainerInstance($value, $bonus)));
        $this->assertSame($result, $normalizer->normalize($value, $rowData, $format, $this->getNormalizerFieldsContainerInstance($value, $bonus)));
    }
}


