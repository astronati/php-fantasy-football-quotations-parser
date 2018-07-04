<?php

use FFQP\Map\Row\Normalizer\Field\Type\VoteNormalizer;
use PHPUnit\Framework\TestCase;

class VoteNormalizerTest extends TestCase
{
    private function getNormalizerFieldsContainerInstance()
    {
        $instance = $this->getMockBuilder('FFQP\Map\Row\Normalizer\Field\NormalizedFieldsContainer')->disableOriginalConstructor()->getMock();
        return $instance;
    }

    public function dataProvider()
    {
        return [
          ['S.V.', null, 'null'],
          ['0', null, 'null'],
          [0, null, 'null'],
          [0.5, 0.5, 'float'],
          ['0.5', 0.5, 'float'],
          [1, 1.0, 'float'],
          ['1', 1.0, 'float'],
        ];
    }

    /**
     * @dataProvider dataProvider
     * @param * $value
     * @param ?float $result
     * @param string $type
     */
    public function testNormalize($value, $result, $type)
    {
        $vote = new VoteNormalizer();
        $this->assertInternalType(
          $type,
          $vote->normalize(
            $value,
            $this->getMockBuilder('FFQP\Map\Row\Row')->disableOriginalConstructor()->getMock(),
            'any_type',
            $this->getNormalizerFieldsContainerInstance()
          )
        );
        $this->assertSame(
          $result,
          $vote->normalize(
            $value,
            $this->getMockBuilder('FFQP\Map\Row\Row')->disableOriginalConstructor()->getMock(),
            'any_type',
            $this->getNormalizerFieldsContainerInstance()
          )
        );
    }
}
