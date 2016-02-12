<?php

include __DIR__ . '/../../../src/parser/gazzetta/GazzettaQuotationsParser.php';

class GazzettaQuotationsParserTest extends PHPUnit_Framework_TestCase {

  public function testGazzettaQuotationsParserConstruct() {
    $reader = $this->getMockBuilder('SpreadsheetReader')->getMock();
    $reader::staticExpects($this->any())
        ->method('val')
        ->will($this->returnValue('bar'));

    $normalizer = $this->getMock('QuotationNormalizerInterface');
    $parser = new GazzettaQuotationsParser($reader, $normalizer);
  }
}
