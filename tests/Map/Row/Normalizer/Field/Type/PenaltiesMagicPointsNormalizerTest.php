<?php

namespace Tests\Map\Row\Normalizer\Field\Type;

use FFQP\Map\Row\Normalizer\Field\Type\PenaltiesMagicPointsNormalizer;
use PHPUnit\Framework\TestCase;

class PenaltiesMagicPointsNormalizerTest extends TestCase
{
    private function getNormalizerFieldsContainerInstance()
    {
        $instance = $this->getMockBuilder('FFQP\Map\Row\Normalizer\Field\NormalizedFieldsContainer')
          ->disableOriginalConstructor()
          ->setMethods(['get'])
          ->getMock();
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
          ['-', 'P', 3, 0.0],
          ['-', 'P', 4, 0.0],
          [0, 'P', 4, 0.0],
          [0, 'D', 4, 0.0],
          ['3', 'P', 4, 3.0],
          ['3.0', 'D', 4, 3.0],
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
        $normalizer = new PenaltiesMagicPointsNormalizer();
        $rowData = $this->getRowDataInstance($role);
        $this->assertSame($result, $normalizer->normalize($value, $rowData, $version, $this->getNormalizerFieldsContainerInstance()));
    }
}
