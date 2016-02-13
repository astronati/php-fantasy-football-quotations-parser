<?php

class GazzettaQuotationsParserTest extends PHPUnit_Framework_TestCase {

  public function testGazzettaQuotationsParserConstruct() {
    $reader = $this->getMockBuilder('SpreadsheetReader')->getMock();
    $reader->method('val')->willReturn('bar');

    $normalizer = $this->getMock('QuotationNormalizerInterface');
    $parser = new GazzettaQuotationsParser($reader, $normalizer);
  }
}
