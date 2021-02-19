<?php

namespace Tests\Map\Row\Normalizer\Field\Type;

use FFQP\Map\Row\Normalizer\Field\Type\YellowCardsMagicPointsNormalizer;
use FFQP\Model\Quotation;
use PHPUnit\Framework\TestCase;

class YellowCardsMagicPointsNormalizerTest extends TestCase
{
    private function getYellowCardsNormalizer($autoGoals, $malus)
    {
        $instance = $this->getMockBuilder('FFQP\Map\Row\Normalizer\Field\Type\YellowCardsNormalizer')
          ->disableOriginalConstructor()
          ->setMethods(['normalize'])
          ->getMock();
        $instance->method('normalize')->with($autoGoals)->willReturn($malus);
        return $instance;
    }

    private function getNormalizerFieldsContainerInstance($yellowCards, $malus)
    {
        $instance = $this->getMockBuilder('FFQP\Map\Row\Normalizer\Field\NormalizedFieldsContainer')
          ->disableOriginalConstructor()
          ->setMethods(['get'])
          ->getMock();

        $map = [
          [Quotation::YELLOW_CARDS, $this->getYellowCardsNormalizer($yellowCards, $malus)]
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
          ['-0.5', 'P', 3, 1, -0.5],
          ['-0.5', 'D', 3, 1, -0.5],
          ['-', 'P', 4, 0, 0.0],
          ['-', 'D', 4, 0, 0.0],
          ['0', 'P', 4, 0, 0.0],
          ['0', 'D', 4, 0, 0.0],
          [0, 'P', 4, 0, 0.0],
          [0, 'D', 4, 0, 0.0],
          ['1', 'P', 4, 1, -0.5],
          ['1', 'D', 4, 1, -0.5],
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
        $normalizer = new YellowCardsMagicPointsNormalizer();
        $rowData = $this->getRowDataInstance($role);
        $this->assertSame($result, $normalizer->normalize($value, $rowData, $version, $this->getNormalizerFieldsContainerInstance($value, $malus)));
    }
}
