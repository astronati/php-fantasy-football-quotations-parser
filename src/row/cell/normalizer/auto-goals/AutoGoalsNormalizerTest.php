<?php

use \FFQP\Row\Cell\AutoGoalsNormalizer;

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

    private function _getRowDataInstance($role)
    {
        $instance = $this->getMockBuilder('\FFQP\Row\Data\RowData')->getMock();
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
        $rowData = $this->_getRowDataInstance($role);
        $this->assertInternalType('int', $autoGoals->normalize($value, $rowData));
        $this->assertSame($result, $autoGoals->normalize($value, $rowData));
    }
}
