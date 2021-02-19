<?php

namespace Tests\Map\Row\Normalizer\Field\Type;

use FFQP\Model\Quotation;
use PHPUnit\Framework\TestCase;
use FFQP\Map\Row\Normalizer\Field\Type\AutoGoalsNormalizer;

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
          ['-', 'P', 3, 0.0, 0],
          ['-', 'D', 3, 0.0, 0],
          ['0', 'P', 3, 0.0, 0],
          ['0', 'D', 3, 0.0, 0],
          [0, 'P', 3, 0.0, 0],
          [0, 'D', 3, 0.0, 0],
          ['-2.0', 'P', 3, -2.0, 2],
          ['-2.0', 'D', 3, -2.0, 1],
          ['-2,0', 'D', 3, -2.0, 1],
          ['-', 'P', 4, 0.0, 0],
          ['-', 'D', 4, 0.0, 0],
          ['0', 'P', 4, 0.0, 0],
          ['0', 'D', 4, 0.0, 0],
          [0, 'P', 4, 0.0, 0],
          [0, 'D', 4, 0.0, 0],
          ['2', 'P', 4, 0.0, 2],
          ['2', 'D', 4, 0.0, 2],
        ];
    }

    /**
     * @dataProvider dataProvider
     * @param * $value
     * @param string $role
     * @param int $version
     * @param float $malus
     * @param int $result
     */
    public function testNormalize($value, $role, $version, $malus, $result)
    {
        $normalizer = new AutoGoalsNormalizer();
        $rowData = $this->getRowDataInstance($role, $value);
        $this->assertSame($result, $normalizer->normalize($value, $rowData, $version, $this->getNormalizerFieldsContainerInstance($value, $malus)));
    }
}
