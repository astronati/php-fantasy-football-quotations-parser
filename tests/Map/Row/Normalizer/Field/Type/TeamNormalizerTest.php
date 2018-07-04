<?php

use FFQP\Map\Row\Normalizer\Field\Type\TeamNormalizer;
use PHPUnit\Framework\TestCase;

class TeamNormalizerTest extends TestCase
{
    private function getNormalizerFieldsContainerInstance()
    {
        $instance = $this->getMockBuilder('FFQP\Map\Row\Normalizer\Field\NormalizedFieldsContainer')->disableOriginalConstructor()->getMock();
        return $instance;
    }

    public function dataProvider()
    {
        return [
          ['test', 'test'],
          ['0', '0'],
          [0.5, '0.5'],
        ];
    }

    /**
     * @dataProvider dataProvider
     * @param * $value
     * @param string $result
     */
    public function testNormalize($value, $result)
    {
        $team = new TeamNormalizer();
        $this->assertInternalType(
          'string',
          $team->normalize(
            $value,
            $this->getMockBuilder('FFQP\Map\Row\Row')->disableOriginalConstructor()->getMock(),
            'any_type',
            $this->getNormalizerFieldsContainerInstance()
          )
        );
        $this->assertSame(
          $result,
          $team->normalize(
            $value,
            $this->getMockBuilder('FFQP\Map\Row\Row')->disableOriginalConstructor()->getMock(),
            'any_type',
            $this->getNormalizerFieldsContainerInstance()
          )
        );
    }
}
