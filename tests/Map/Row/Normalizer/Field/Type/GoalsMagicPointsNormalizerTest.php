<?php

namespace Tests\Map\Row\Normalizer\Field\Type;

use FFQP\Map\Row\Normalizer\Field\Type\GoalsMagicPointsNormalizer;
use FFQP\Model\Quotation;
use FFQP\Parser\QuotationsParserFactory;
use PHPUnit\Framework\TestCase;

class GoalsMagicPointsNormalizerTest extends TestCase
{
    private function getGoalsNormalizer($magicPoints, $expectedGoals)
    {
        $instance = $this->getMockBuilder('FFQP\Map\Row\Normalizer\Field\Type\GoalsNormalizer')
          ->disableOriginalConstructor()
          ->setMethods(['normalize'])
          ->getMock();
        $instance->method('normalize')->with($magicPoints)->willReturn($expectedGoals);
        return $instance;
    }

    private function getNormalizerFieldsContainerInstance($magicPoints, $expectedGoals)
    {
        $instance = $this->getMockBuilder('FFQP\Map\Row\Normalizer\Field\NormalizedFieldsContainer')
          ->disableOriginalConstructor()
          ->setMethods(['get'])
          ->getMock();

        $map = [
          [Quotation::GOALS, $this->getGoalsNormalizer($magicPoints, $expectedGoals)]
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
          ['3', 'A', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2017, 1, 3.0],
          ['3', 'A', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_WORLD_CUP_2018, 1, 3.0],
          ['4.5', 'D', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2017, 1, 4.5],
          ['1', 'D', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_WORLD_CUP_2018, 1, 4.5],
        ];
    }

    /**
     * @dataProvider dataProvider
     * @param * $value
     * @param string $role
     * @param string $format
     * @param int $goals
     * @param float $result
     */
    public function testNormalize($value, $role, $format, $goals, $result)
    {
        $normalizer = new GoalsMagicPointsNormalizer();
        $rowData = $this->getRowDataInstance($role);
        $this->assertInternalType('float', $normalizer->normalize($value, $rowData, $format, $this->getNormalizerFieldsContainerInstance($value, $goals)));
        $this->assertSame($result, $normalizer->normalize($value, $rowData, $format, $this->getNormalizerFieldsContainerInstance($value, $goals)));
    }
}


