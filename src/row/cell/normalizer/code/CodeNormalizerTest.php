<?php

use \FFQP\Row\Cell\CodeNormalizer as CodeNormalizer;

/**
 * @codeCoverageIgnore
 */
class CodeNormalizerTest extends PHPUnit_Framework_TestCase {

  public function dataProvider() {
    return array(
      array('test', 'test'),
      array('0', '0'),
      array(123, '123'),
      array('123', '123'),
    );
  }

  /**
   * @dataProvider dataProvider
   * @param * $value
   * @param string $result
   */
  public function testNormalize($value, $result) {
    $code = new CodeNormalizer();
    $this->assertInternalType('string', $code->normalize($value, $this->getMockBuilder('\FFQP\Row\Data\RawData')->getMock()));
    $this->assertSame($result, $code->normalize($value, $this->getMockBuilder('\FFQP\Row\Data\RawData')->getMock()));
  }
}
