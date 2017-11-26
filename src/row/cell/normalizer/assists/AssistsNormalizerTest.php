<?php

use \FFQP\Row\Cell\AssistsNormalizer as AssistsNormalizer;

/**
 * @codeCoverageIgnore
 */
class AssistsNormalizerTest extends PHPUnit_Framework_TestCase
{
    
    public function dataProvider()
    {
        return array(
          array('10', 10),
          array(10, 10),
          array('1', 1),
          array(1, 1),
          array(0, 0),
          array('0', 0),
        );
    }
    
    /**
     * @dataProvider dataProvider
     * @param * $value
     * @param int $result
     */
    public function testNormalize($value, $result)
    {
        $assists = new AssistsNormalizer();
        $this->assertInternalType('int', $assists->normalize($value, $this->getMockBuilder('\FFQP\Row\Data\RawData')->getMock()));
        $this->assertSame($result, $assists->normalize($value, $this->getMockBuilder('\FFQP\Row\Data\RawData')->getMock()));
    }
}
