<?php

class GazzettaQuotationsParserTest extends PHPUnit_Framework_TestCase {

  /**
   * @param string $filePath
   */
  public function testGetNewspaperMethod($filePath) {
    $reader = $this->getMockBuilder('\PHPExcelReader\SpreadsheetReader')->getMock();
    $normalizer = $this->getMockBuilder('QuotationNormalizerInterface')->getMock();

    $parser = new GazzettaQuotationsParser($reader, $normalizer);
    $this->assertEquals($parser->getNewspaper(), 'La Gazzetta dello Sport');
  }
}
