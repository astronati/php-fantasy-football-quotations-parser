<?php

namespace Tests\Map\Row\Normalizer\Field\Type;

use FFQP\Map\Row\Normalizer\Field\Type\PenaltiesNormalizer;
use FFQP\Model\Quotation;
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
          ['-', 'P', 3, 0],
          ['-', 'D', 3, 0],
          ['0', 'P', 3, 0],
          ['0', 'D', 3, 0],
          [0, 'P', 3, 0],
          [0, 'D', 3, 0],
          ['3.0', 'P', 3, 1],
          ['-3.0', 'D', 3, 1],
          ['-3,0', 'D', 3, 1],
          ['-', 'P', 4, 0],
          ['-', 'D', 4, 0],
          ['0', 'P', 4, 0],
          ['0', 'D', 4, 0],
          [0, 'P', 4, 0],
          [0, 'D', 4, 0],
          ['3', 'P', 4, 1],
          ['-3', 'D', 4, 1],
        ];
    }

    /**
     * @dataProvider dataProvider
     * @param * $value
     * @param string $role
     * @param int $version
     * @param int $result
     */
    public function testNormalize($value, $role, $version, $result)
    {
        $normalizer = new PenaltiesNormalizer();
        $rowData = $this->getRowDataInstance($role);
        $this->assertSame($result, $normalizer->normalize($value, $rowData, $version, $this->getNormalizerFieldsContainerInstance($value)));
    }
}
