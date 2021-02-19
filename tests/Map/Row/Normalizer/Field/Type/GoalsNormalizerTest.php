<?php

namespace Tests\Map\Row\Normalizer\Field\Type;

use FFQP\Map\Row\Normalizer\Field\Type\GoalsNormalizer;
use FFQP\Model\Quotation;
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
          ['-', 'P', 3, 0.0, 0],
          ['0', 'P', 3, 0.0, 0],
          ['0.0', 'P', 3, 0.0, 0],
          ['0,0', 'P', 3, 0.0, 0],
          [0, 'P', 3, 0.0, 0],
          ['-3.0', 'P', 3, -30.0, 3],
          ['9.0', 'D', 3, 9.0, 2],
          ['8.0', 'C', 3, 8.0, 2],
          ['7.0', 'T', 3, 7.0, 2],
          ['6.0', 'A', 3, 6.0, 2],
          ['-', 'P', 4, 0.0, 0],
          ['0', 'P', 4, 0.0, 0],
          ['0.0', 'P', 4, 0.0, 0],
          ['0,0', 'P', 4, 0.0, 0],
          [0, 'P', 4, 0.0, 0],
          ['-3', 'P', 4, -3.0, 3],
          ['3', 'D', 4, 13.5, 3],
          ['2', 'C', 4, 8.0, 2],
          ['2', 'T', 4, 7.5, 2],
          ['2', 'A', 4, 6.0, 2],
          ['-', 'P', 2, 0.0, 0],
          ['0', 'P', 2, 0.0, 0],
          ['0.0', 'P', 2, 0.0, 0],
          ['0,0', 'P', 2, 0.0, 0],
          [0, 'P', 2, 0.0, 0],
          ['-3.0', 'P', 2, -3.0, 3],
          ['6.0', 'D', 2, 6.0, 2],
          ['6.0', 'C', 2, 6.0, 2],
          ['6.0', 'A', 2, 6.0, 2],
        ];
    }

    /**
     * @dataProvider dataProvider
     * @param * $value
     * @param string $role
     * @param int $version
     * @param float $bonus
     * @param int $result
     */
    public function testNormalize($value, $role, $version, $bonus, $result)
    {
        $normalizer = new GoalsNormalizer();
        $rowData = $this->getRowDataInstance($role, $value);
        $this->assertSame($result, $normalizer->normalize($value, $rowData, $version, $this->getNormalizerFieldsContainerInstance($value, $bonus)));
    }
}


