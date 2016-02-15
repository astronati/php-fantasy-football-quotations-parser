<?php

class QuotationsParserFactoryTest extends PHPUnit_Framework_TestCase {

  public function goodSpreadsheetsProvider() {
    return array(
        array(__DIR__ . '/fixtures/2015_25.xls', 1),
    );
  }

  public function badSpreadsheetsProvider() {
    return array(
        array(__DIR__ . '/fixtures/test.xls'),
    );
  }

  /**
   * @dataProvider goodSpreadsheetsProvider
   * @param string $filePath
   * @param integer $type
   */
  public function testValidSpreadsheet($filePath, $type) {
    $mock = $this->getMockBuilder('\PHPExcelReader\SpreadsheetReader')->getMock();
    $this->assertNotNull(QuotationsParserFactory::create($filePath));
    $this->assertNotNull(QuotationsParserFactory::create($filePath, $type));
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage File does not exist
   * @dataProvider badSpreadsheetsProvider
   * @param string $filePath
   */
  public function testNotExistingSpreadsheet($filePath) {
    $mock = $this->getMockBuilder('\PHPExcelReader\SpreadsheetReader')->getMock();
    QuotationsParserFactory::create($filePath);
  }

  /**
   * @expectedException Exception
   * @expectedExceptionMessage The specific parser does not exist
   * @dataProvider goodSpreadsheetsProvider
   * @param string $filePath
   * @param integer $type
   */
  public function testNotAllowedType($filePath, $type = 1) {
    $mock = $this->getMockBuilder('\PHPExcelReader\SpreadsheetReader')->getMock();
    QuotationsParserFactory::create($filePath, $type + 1);
  }
}
