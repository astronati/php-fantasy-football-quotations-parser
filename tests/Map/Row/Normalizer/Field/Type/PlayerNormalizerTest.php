<?php

use PHPUnit\Framework\TestCase;
use FFQP\Map\Row\Normalizer\Field\Type\PlayerNormalizer;

class PlayerNormalizerTest extends TestCase
{

    public function dataProvider()
    {
        return [
          ['test', 'test'],
          ['0', '0'],
          ['DONNARUMMA Gigio', 'DONNARUMMA Gigio'],
        ];
    }

    /**
     * @dataProvider dataProvider
     * @param * $value
     * @param string $result
     */
    public function testNormalize($value, $result)
    {
        $player = new PlayerNormalizer();
        $this->assertInternalType(
          'string',
          $player->normalize(
            $value,
            $this->getMockBuilder('FFQP\Map\Row\Row')->disableOriginalConstructor()->getMock(),
            'any_type'
          )
        );
        $this->assertSame(
          $result,
          $player->normalize(
            $value,
            $this->getMockBuilder('FFQP\Map\Row\Row')->disableOriginalConstructor()->getMock(),
            'any_type'
          )
        );
    }
}
