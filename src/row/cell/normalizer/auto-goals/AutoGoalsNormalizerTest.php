<?php

use \FFQP\Row\Cell\AutoGoalsNormalizer as AutoGoalsNormalizer;

/**
 * @codeCoverageIgnore
 */
class AutoGoalsNormalizerTest extends PHPUnit_Framework_TestCase
{

    public function dataProvider()
    {
        return [
          ['-', 'P', 0],
          ['-', 'D', 0],
          ['0', 'P', 0],
          ['0', 'D', 0],
          [0, 'P', 0],
          [0, 'D', 0],
          ['-2.0', 'P', 2],
          ['-2.0', 'D', 1],
          ['-2,0', 'D', 1],
        ];
    }

    private function _getRawDataInstance($role)
    {
        $instance = $this->getMockBuilder('\FFQP\Row\Data\RawData')->getMock();
        $instance->role = $role;
        return $instance;
    }

    /**
     * @dataProvider dataProvider
     * @param * $value
     * @param string $role
     * @param int $result
     */
    public function testNormalize($value, $role, $result)
    {
        $autoGoals = new AutoGoalsNormalizer();
        $rawData = $this->_getRawDataInstance($role);
        $this->assertInternalType('int', $autoGoals->normalize($value, $rawData));
        $this->assertSame($result, $autoGoals->normalize($value, $rawData));
    }
}
