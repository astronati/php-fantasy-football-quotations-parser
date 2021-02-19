<?php

namespace Tests\Map\Row\Normalizer\Field\Type;

use FFQP\Map\Row\Normalizer\Field\Type\AutoGoalsMagicPointsNormalizer;
use FFQP\Model\Quotation;
use PHPUnit\Framework\TestCase;

class AutoGoalsMagicPointsNormalizerTest extends TestCase
{
    private function getAutoGoalsNormalizer($value, $autoGoalsNumber)
    {
        $instance = $this->getMockBuilder('FFQP\Map\Row\Normalizer\Field\Type\AutoGoalsNormalizer')
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
          ['-', 'P', 3, 0, 0.0],
          ['-', 'D', 3, 0, 0.0],
          ['0', 'P', 3, 0, 0.0],
          ['0', 'D', 3, 0, 0.0],
          [0, 'P', 3, 0, 0.0],
          [0, 'D', 3, 0, 0.0],
          ['-2.0', 'P', 3, 2, -2.0],
          ['-2.0', 'D', 3, 1, -2.0],
          ['-2,0', 'D', 3, 1, -2.0],
          ['-', 'P', 4, 0, 0.0],
          ['-', 'D', 4, 0, 0.0],
          ['0', 'P', 4, 0, 0.0],
          ['0', 'D', 4, 0, 0.0],
          [0, 'P', 4, 0, 0.0],
          [0, 'D', 4, 0, 0.0],
          ['2', 'P', 4, 2, -2.0],
          ['2', 'D', 4, 2, -4.0],
        ];
    }

    /**
     * @dataProvider dataProvider
     * @param * $value
     * @param string $role
     * @param int $version
     * @param int $autoGoalsNumber
     * @param int $result
     */
    public function testNormalize($value, $role, $version, $autoGoalsNumber, $result)
    {
        $normalizer = new AutoGoalsMagicPointsNormalizer();
        $rowData = $this->getRowDataInstance($role);
        $this->assertSame($result, $normalizer->normalize($value, $rowData, $version, $this->getNormalizerFieldsContainerInstance($value, $autoGoalsNumber)));
    }
}
