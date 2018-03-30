<?php

use PHPUnit\Framework\TestCase;
use FFQP\Map\Row\Normalizer\Field\GoalsNormalizer;
use FFQP\Parser\QuotationsParserFactory;

class GoalsNormalizerTest extends TestCase
{

    public function dataProvider()
    {
        return [
          ['-', 'P', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2017, 0],
          ['0', 'P', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2017, 0],
          ['0.0', 'P', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2017, 0],
          ['0,0', 'P', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2017, 0],
          [0, 'P', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2017, 0],
          ['-3.0', 'P', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2017, 3],
          ['9.0', 'D', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2017, 2],
          ['8.0', 'C', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2017, 2],
          ['7.0', 'T', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2017, 2],
          ['7.0', 'T', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2017, 2],
          ['6.0', 'A', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2017, 2],
          ['6.0', 'A', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2013, 2],
        ];
    }

    private function _getRowDataInstance($role)
    {
        $instance = $this->getMockBuilder('FFQP\Map\Row\Row')->disableOriginalConstructor()->getMock();
        $instance->role = $role;
        return $instance;
    }

    /**
     * @dataProvider dataProvider
     * @param * $value
     * @param string $role
     * @param string $format ;
     * @param int $result
     */
    public function testNormalize($value, $role, $format, $result)
    {
        $goals = new GoalsNormalizer();
        $row = $this->_getRowDataInstance($role);
        $this->assertInternalType('int', $goals->normalize($value, $row, $format));
        $this->assertSame($result, $goals->normalize($value, $row, $format));
    }
}
