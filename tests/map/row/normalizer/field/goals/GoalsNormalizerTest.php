<?php

use PHPUnit\Framework\TestCase;
use FFQP\Map\Row\GoalsNormalizer;
use FFQP\Parser\QuotationsParserFactory;

class GoalsNormalizerTest extends TestCase
{

    public function dataProvider()
    {
        return [
          ['-', 'P', 'P', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2015, 0],
          ['0', 'P', 'P', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2015, 0],
          ['0.0', 'P', 'P', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2015, 0],
          ['0,0', 'P', 'P', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2015, 0],
          [0, 'P', 'P', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2015, 0],
          ['-3.0', 'P', 'P', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2015, 3],
          ['10.0', 'P', 'P', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2015, 2],
          ['9.0', 'D', 'D', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2015, 2],
          ['8.0', 'C', 'C', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2015, 2],
          ['7.0', 'C', 'T', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2015, 2],
          ['7.0', 'A', 'T', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2015, 2],
          ['6.0', 'A', 'A', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2015, 2],
          ['6.0', 'A', 'A', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2013, 2],
        ];
    }

    private function _getRowDataInstance($role, $secondaryRole)
    {
        $instance = $this->getMockBuilder('FFQP\Map\Row\Row')->disableOriginalConstructor()->getMock();
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
        $row = $this->_getRowDataInstance($role, $secondaryRole);
        $this->assertInternalType('int', $goals->normalize($value, $row, $format));
        $this->assertSame($result, $goals->normalize($value, $row, $format));
    }
}
