<?php

use \FFQP\Row\Cell\ActiveNormalizer as ActiveNormalizer;

/**
 * @codeCoverageIgnore
 */
class ActiveNormalizerTest extends PHPUnit_Framework_TestCase
{
    
    public function dataProvider()
    {
        return array(
          array('1', true),
          array(1, true),
          array('0', false),
          array(0, false),
          array('SI', true),
          array('NO', false),
        );
    }
    
    /**
     * @dataProvider dataProvider
     * @param * $value
     * @param int $result
     */
    public function testNormalize($value, $result)
    {
        $active = new ActiveNormalizer();
        $this->assertSame($result, $active->normalize($value, $this->getMockBuilder('\FFQP\Row\Data\RawData')->getMock()));
    }
}
