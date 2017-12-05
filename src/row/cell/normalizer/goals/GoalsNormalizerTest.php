<?php

use \FFQP\Row\Cell\GoalsNormalizer;
use \FFQP\Row\Data\PlayerDataGeneratorFactory;

/**
 * @codeCoverageIgnore
 */
class GoalsNormalizerTest extends PHPUnit_Framework_TestCase
{

    public function dataProvider()
    {
        return [
          ['-', 'P', 'P', PlayerDataGeneratorFactory::FORMAT_GAZZETTA_SINCE_2015, 0],
          ['0', 'P', 'P', PlayerDataGeneratorFactory::FORMAT_GAZZETTA_SINCE_2015, 0],
          ['0.0', 'P', 'P', PlayerDataGeneratorFactory::FORMAT_GAZZETTA_SINCE_2015, 0],
          ['0,0', 'P', 'P', PlayerDataGeneratorFactory::FORMAT_GAZZETTA_SINCE_2015, 0],
          [0, 'P', 'P', PlayerDataGeneratorFactory::FORMAT_GAZZETTA_SINCE_2015, 0],
          ['-3.0', 'P', 'P', PlayerDataGeneratorFactory::FORMAT_GAZZETTA_SINCE_2015, 3],
          ['10.0', 'P', 'P', PlayerDataGeneratorFactory::FORMAT_GAZZETTA_SINCE_2015, 2],
          ['9.0', 'D', 'D', PlayerDataGeneratorFactory::FORMAT_GAZZETTA_SINCE_2015, 2],
          ['8.0', 'C', 'C', PlayerDataGeneratorFactory::FORMAT_GAZZETTA_SINCE_2015, 2],
          ['7.0', 'C', 'T', PlayerDataGeneratorFactory::FORMAT_GAZZETTA_SINCE_2015, 2],
          ['7.0', 'A', 'T', PlayerDataGeneratorFactory::FORMAT_GAZZETTA_SINCE_2015, 2],
          ['6.0', 'A', 'A', PlayerDataGeneratorFactory::FORMAT_GAZZETTA_SINCE_2015, 2],
          ['6.0', 'A', 'A', PlayerDataGeneratorFactory::FORMAT_GAZZETTA_SINCE_2015, 2],
        ];
    }

    private function _getRowDataInstance($role, $secondaryRole)
    {
        $instance = $this->getMockBuilder('\FFQP\Row\Data\RowData')->getMock();
        $instance->role = $role;
        $instance->secondaryRole = $secondaryRole;
        return $instance;
    }

    /**
     * @dataProvider dataProvider
     * @param * $value
     * @param string $role
     * @param string $secondaryRole
     * @param string $format ;
     * @param int $result
     */
    public function testNormalize($value, $role, $secondaryRole, $format, $result)
    {
        $goals = new GoalsNormalizer();
        $rowData = $this->_getRowDataInstance($role, $secondaryRole);
        $this->assertInternalType('int', $goals->normalize($value, $rowData, $format));
        $this->assertSame($result, $goals->normalize($value, $rowData, $format));
    }
}
