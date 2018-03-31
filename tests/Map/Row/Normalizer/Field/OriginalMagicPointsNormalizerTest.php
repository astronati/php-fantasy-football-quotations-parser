<?php

use FFQP\Map\Row\Normalizer\Field\OriginalMagicPointsNormalizer;
use FFQP\Parser\QuotationsParserFactory;
use PHPUnit\Framework\TestCase;

class OriginalMagicPointsNormalizerTest extends TestCase
{

    public function dataProvider()
    {
        return [
          ['0', 'C', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2017, null, 0, null],
          ['-3.0', 'P', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2017, 6, 0, 6],
          ['-3.0', 'P', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2015, 6, 0, 6],
          ['10.0', 'D', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2017, 10, 1, 8.5],
          ['10.0', 'D', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2017, 10, 2, 7],
          ['10.0', 'D', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2015, 10, 1, 10],
          ['10.0', 'C', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2017, 10, 1, 9],
          ['10.0', 'C', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2017, 10, 2, 8],
          ['10.0', 'C', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2015, 10, 1, 10],
          ['10.0', 'T', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2017, 10, 1, 9.5],
          ['10.0', 'T', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2017, 10, 2, 9],
          ['10.0', 'T', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2015, 10, 1, 10],
          ['10.0', 'A', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2017, 10, 1, 10],
          ['10.0', 'A', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2017, 10, 2, 10],
          ['10.0', 'A', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2015, 10, 1, 10],
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
     * @param string $format
     * @param float $magicPoints
     * @param int $goals
     * @param int $result
     */
    public function testNormalize($value, $role, $format, $magicPoints, $goals, $result)
    {
        $normalizer = new OriginalMagicPointsNormalizer();
        $row = $this->_getRowDataInstance($role);
        $normalizedValue = $normalizer->normalize(
          $value,
          $row,
          $format,
          ['magicPoints' => $magicPoints, 'goals' => $goals]
        );
        if ($result === null) {
            $this->assertInternalType('null', $normalizedValue);
        }
        else {
            $this->assertInternalType('float', $normalizedValue);
        }

        $this->assertEquals($result, $normalizedValue);
    }
}
