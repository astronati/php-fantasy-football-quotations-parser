<?php

use \FFQP\Row\Cell\TeamNormalizer as TeamNormalizer;

/**
 * @codeCoverageIgnore
 */
class TeamNormalizerTest extends PHPUnit_Framework_TestCase
{
    
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
          $team->normalize($value, $this->getMockBuilder('\FFQP\Row\Data\RawData')->getMock())
        );
        $this->assertSame(
          $result,
          $team->normalize($value, $this->getMockBuilder('\FFQP\Row\Data\RawData')->getMock())
        );
    }
}
