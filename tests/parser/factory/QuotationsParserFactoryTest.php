<?php

include __DIR__ . '/../../../src/parser/factory/QuotationsParserFactory.php';

class QuotationsParserFactoryTest extends PHPUnit_Framework_TestCase {

  public function testQuotationsParserFactoryCreateMethod() {
    $stub = $this->getMockBuilder('SpreadsheetReader')->getMock();
    $parser = QuotationsParserFactory::create('..');
  }

  /**
   * @expectedException Exception
   */
  public function testQuotationsParserFactoryCreateMethodException() {
    $stub = $this->getMockBuilder('SpreadsheetReader')->getMock();
    $parser = QuotationsParserFactory::create('..', 9999);
  }
}
