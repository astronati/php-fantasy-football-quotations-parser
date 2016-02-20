<?php

class GazzettaQuotationsParserTest extends PHPUnit_Framework_TestCase {

  public function fieldsProvider() {
    return array(
      array(
        array(
          'code',
          'player',
          'team',
          'role',
          'secondaryRole',
          'status',
          'quotation',
          'magicPoints',
          'vote',
          'goals',
          'cautions',
          'expulsion',
          'penalties',
          'autoGoals',
          'assists',
        )
      )
    );
  }

  public function spreadsheetTitlesProvider() {
    return array(
        array('101', null),
        array('Magic Campionato: quotazioni e punteggi dei giocatori dopo la giornata N.22', '22'),
        array('Magic Campionato: quotazioni dei giocatori aggiornate al 30 Aug 2014', null),
    );
  }

  public function quotationsProvider() {
    return array(
      array(
        array(
          array('Magic Campionato: quotazioni dei giocatori aggiornate al 30 Aug 2014'),
          array(''),
          array(101, 'name1', 'squadra1', 'D', 'D', 'NO', '', '', '', '', '', '', '', '', ''),
          array(102, 'name2', 'squadra2', 'C', 'T', 'SI', '', '', '', '', '', '', '', '', ''),
          array(103, 'name3', 'squadra3', 'A', 'T', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
          array(104, 'name4', 'squadra4', 'A', 'A', 0, 1, 1, 1, 1, 1, 1, 1, 1, 1),
        ),
        array(
          101 => array(
            'code' => 101,
            'player' => 'name1',
            'team' => 'squadra1',
            'role' => 'D',
            'secondaryRole' => 'D',
            'status' => 'NO',
            'quotation' => 0,
            'magicPoints' => 0,
            'vote' => 0,
            'goals' => 0,
            'cautions' => 0,
            'expulsion' => 0,
            'penalties' => 0,
            'autoGoals' => 0,
            'assists' => 0,
          ),
          102 => array(
            'code' => 102,
            'player' => 'name2',
            'team' => 'squadra2',
            'role' => 'C',
            'secondaryRole' => 'T',
            'status' => 'SI',
            'quotation' => 0,
            'magicPoints' => 0,
            'vote' => 0,
            'goals' => 0,
            'cautions' => 0,
            'expulsion' => 0,
            'penalties' => 0,
            'autoGoals' => 0,
            'assists' => 0,
          ),
          103 => array(
            'code' => 103,
            'player' => 'name3',
            'team' => 'squadra3',
            'role' => 'A',
            'secondaryRole' => 'T',
            'status' => 1,
            'quotation' => 1,
            'magicPoints' => 1,
            'vote' => 1,
            'goals' => 1,
            'cautions' => 1,
            'expulsion' => 1,
            'penalties' => 1,
            'autoGoals' => 1,
            'assists' => 1,
          ),
          104 => array(
            'code' => 104,
            'player' => 'name4',
            'team' => 'squadra4',
            'role' => 'A',
            'secondaryRole' => 'A',
            'status' => 0,
            'quotation' => 1,
            'magicPoints' => 1,
            'vote' => 1,
            'goals' => 1,
            'cautions' => 1,
            'expulsion' => 1,
            'penalties' => 1,
            'autoGoals' => 1,
            'assists' => 1,
          ),
        )
      ),
      array(
        array(),
        array()
      )
    );
  }

  /**
   * @dataProvider fieldsProvider
   */
  public function testGetFieldsMethod($fields) {
    $reader = $this->getMockBuilder('\PHPExcelReader\SpreadsheetReader')->getMock();
    $normalizer = $this->getMockBuilder('QuotationNormalizerInterface')->getMock();
    $parser = new GazzettaQuotationsParser($reader, $normalizer);
    $this->assertEquals($parser->getFields(), $fields);
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

    $reader->method('val')
      ->with(1, 1)
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
      ->setMethods(array('rowcount', 'val'))
      ->getMock();

    $reader->method('rowcount')
      ->will($this->returnValue(count($readerContent)));

    $valueMap = array();
    for ($i = 0; $i < count($readerContent); $i++) {
      for ($k = 0; $k < count($readerContent[$i]); $k++) {
        array_push($valueMap, array($i + 1, $k + 1, 0, $readerContent[$i][$k]));
      }
    }

    $reader->method('val')
      ->will($this->returnValueMap($valueMap));

    $normalizer = $this->getMockBuilder('QuotationNormalizerInterface')->getMock();
    $parser = new GazzettaQuotationsParser($reader, $normalizer);
    $this->assertEquals($parser->getQuotations(), $result);
  }
}
