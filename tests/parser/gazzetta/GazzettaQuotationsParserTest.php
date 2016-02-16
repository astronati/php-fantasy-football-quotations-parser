<?php

class GazzettaQuotationsParserTest extends PHPUnit_Framework_TestCase {

  public function spreadsheetTitlesProvider() {
    return array(
        array('101', null),
        array('Magic Campionato: quotazioni e punteggi dei giocatori dopo la giornata N.22', '22'),
        array('Magic Campionato: quotazioni dei giocatori aggiornate al 30 Aug 2014', null),
    );
  }

  public function quotationsProvider() {
    return array(
      /*array(
        array(
          array('Magic Campionato: quotazioni dei giocatori aggiornate al 30 Aug 2014'),
          array(101),
          array(102),
          array(103),
        ),
        array('result')
      ),*/
      array(
        array(),
        array()
      )
    );
  }

  /**
   * @dataProvider spreadsheetTitlesProvider
   * @param string $header
   * @param string $result
   */
  public function testGetMatchDayMethod($header, $result) {
    $reader = $this->getMockBuilder('\PHPExcelReader\SpreadsheetReader')
      ->setMethods(array('val'))
      ->getMock();

    $reader->expects($this->once())
      ->method('val')
      ->with($this->equalTo(0), $this->equalTo(0))
      ->will($this->returnValue($header));

    $normalizer = $this->getMockBuilder('QuotationNormalizerInterface')->getMock();

    $parser = new GazzettaQuotationsParser($reader, $normalizer);
    $this->assertEquals($parser->getMatchDayNumber(), $result);
  }

  public function testGetNewspaperMethod() {
    $reader = $this->getMockBuilder('\PHPExcelReader\SpreadsheetReader')->getMock();
    $normalizer = $this->getMockBuilder('QuotationNormalizerInterface')->getMock();

    $parser = new GazzettaQuotationsParser($reader, $normalizer);
    $this->assertEquals($parser->getNewspaper(), 'La Gazzetta dello Sport');
  }

  /**
   * @dataProvider quotationsProvider
   * @param Array $readerContent
   * @param Array $result
   */
  public function testGetQuotationsMethod($readerContent, $result) {
    $reader = $this->getMockBuilder('\PHPExcelReader\SpreadsheetReader')
        ->setMethods(array('rowcount'))
        ->getMock();

    $reader->method('rowcount')
      ->will($this->returnValue(count($readerContent)));

    $normalizer = $this->getMockBuilder('QuotationNormalizerInterface')->getMock();

    $parser = new GazzettaQuotationsParser($reader, $normalizer);
    $this->assertEquals($parser->getQuotations(), $result);
  }
}
