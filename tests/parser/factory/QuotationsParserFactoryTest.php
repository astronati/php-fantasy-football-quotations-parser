<?php

class QuotationsParserFactoryTest extends PHPUnit_Framework_TestCase {

  public function testQuotationsParserFactoryCreateMethod() {
    $stub = $this->getMockBuilder('\PHPExcelReader\SpreadsheetReader')->getMock();
    $parser = QuotationsParserFactory::create('..');
  }

  /**
   * @expectedException Exception
   */
  public function testQuotationsParserFactoryCreateMethodException() {
    $stub = $this->getMockBuilder('\PHPExcelReader\SpreadsheetReader')->getMock();
    $parser = QuotationsParserFactory::create('..', 9999);
  }
}
