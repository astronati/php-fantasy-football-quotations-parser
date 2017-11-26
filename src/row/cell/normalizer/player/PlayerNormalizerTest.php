<?php

use \FFQP\Row\Cell\PlayerNormalizer as PlayerNormalizer;

/**
 * @codeCoverageIgnore
 */
class PlayerNormalizerTest extends PHPUnit_Framework_TestCase
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
          $player->normalize($value, $this->getMockBuilder('\FFQP\Row\Data\RawData')->getMock())
        );
        $this->assertSame(
          $result,
          $player->normalize($value, $this->getMockBuilder('\FFQP\Row\Data\RawData')->getMock())
        );
    }
}
