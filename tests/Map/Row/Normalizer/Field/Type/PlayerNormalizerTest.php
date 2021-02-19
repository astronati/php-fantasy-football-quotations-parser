<?php

use FFQP\Map\Row\Normalizer\Field\Type\PlayerNormalizer;
use PHPUnit\Framework\TestCase;

class PlayerNormalizerTest extends TestCase
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
          ['DONNARUMMA Gigio', 'DONNARUMMA Gigio'],
          ['JOAO MARIO -', 'JOAO MARIO'],
          ['MARLON -', 'MARLON'],
          ['NAME-COOL -', 'NAME-COOL'],
        ];
    }

    /**
     * @dataProvider dataProvider
     * @param * $value
     * @param string $result
     */
    public function testNormalize($value, $result)
    {
        $normalizer = new PlayerNormalizer();
        $this->assertSame(
          $result,
          $normalizer->normalize(
            $value,
            $this->getMockBuilder('FFQP\Map\Row\Row')->disableOriginalConstructor()->getMock(),
            1,
            $this->getNormalizerFieldsContainerInstance()
          )
        );
    }
}
