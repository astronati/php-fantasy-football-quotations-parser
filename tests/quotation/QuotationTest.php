<?php

use \FFQP\Quotation as Quotation;

class QuotationTest extends PHPUnit_Framework_TestCase {

  public function badQuotationConfigs() {
    return array(
        array(array()),
        array(array(
          'code' => 1,
        )),
        array(array(
          'code' => 1,
          'player' => 1,
        )),
        array(array(
          'code' => 1,
          'player' => 1,
          'team' => 1,
        )),
        array(array(
          'code' => 1,
          'player' => 1,
          'team' => 1,
          'role' => 1,
        )),
        array(array(
          'code' => 1,
          'player' => 1,
          'team' => 1,
          'role' => 1,
          'status' => 1,
        )),
        array(array(
          'code' => 1,
          'player' => 1,
          'team' => 1,
          'role' => 1,
          'status' => 1,
          'quotation' => 1,
        )),
        array(array(
          'code' => 1,
          'player' => 1,
          'team' => 1,
          'role' => 1,
          'status' => 1,
          'quotation' => 1,
          'magicPoints' => 1,
        )),
        array(array(
          'code' => 1,
          'player' => 1,
          'team' => 1,
          'role' => 1,
          'status' => 1,
          'quotation' => 1,
          'magicPoints' => 1,
          'vote' => 1,
        )),
        array(array(
          'code' => 1,
          'player' => 1,
          'team' => 1,
          'role' => 1,
          'status' => 1,
          'quotation' => 1,
          'magicPoints' => 1,
          'vote' => 1,
          'goal' => 1,
        )),
        array(array(
          'code' => 1,
          'player' => 1,
          'team' => 1,
          'role' => 1,
          'status' => 1,
          'quotation' => 1,
          'magicPoints' => 1,
          'vote' => 1,
          'goal' => 1,
          'cautions' => 1,
        )),
        array(array(
          'code' => 1,
          'player' => 1,
          'team' => 1,
          'role' => 1,
          'status' => 1,
          'quotation' => 1,
          'magicPoints' => 1,
          'vote' => 1,
          'goal' => 1,
          'cautions' => 1,
          'expulsion' => 1,
        )),
        array(array(
          'code' => 1,
          'player' => 1,
          'team' => 1,
          'role' => 1,
          'status' => 1,
          'quotation' => 1,
          'magicPoints' => 1,
          'vote' => 1,
          'goal' => 1,
          'cautions' => 1,
          'expulsion' => 1,
          'penalties' => 1,
        )),
        array(array(
          'code' => 1,
          'player' => 1,
          'team' => 1,
          'role' => 1,
          'status' => 1,
          'quotation' => 1,
          'magicPoints' => 1,
          'vote' => 1,
          'goal' => 1,
          'cautions' => 1,
          'expulsion' => 1,
          'penalties' => 1,
          'autoGoals' => 1,
        )),
        array(array(
          'code' => '1',
          'player' => '1',
          'team' => '1',
          'role' => '1',
          'status' => '1',
          'quotation' => '1',
          'magicPoints' => '1',
          'vote' => '1',
          'goal' => '1',
          'cautions' => '1',
          'expulsion' => '1',
          'penalties' => '1',
          'autoGoals' => '1',
          'assists' => '1',
        ))
    );
  }

  public function goodQuotationConfigs() {
    return array(array(
      array(
        'code' => '101',
        'player' => 'name',
        'team' => 'fidelis',
        'role' => 'C',
        'secondaryRole' => 'T',
        'status' => '1',
        'quotation' => '12',
        'magicPoints' => '5.5',
        'vote' => '6',
        'goals' => '3',
        'cautions' => '0.5',
        'expulsion' => '1',
        'penalties' => '3',
        'autoGoals' => '-2',
        'assists' => '2',
        'fields' => array('code', 'player', 'quotation'),
      ),
      array(
        'getCode' => 101,
        'getPlayer' => 'name',
        'getTeam' => 'fidelis',
        'getRole' => 'C',
        'getSecondaryRole' => 'T',
        'getStatus' => '1',
        'getQuotation' => 12,
        'getMagicPoints' => 5.5,
        'getVote' => 6.0,
        'getGoals' => 3,
        'getCautions' => 0.5,
        'getExpulsion' => 1,
        'getPenalties' => 3,
        'getAutoGoals' => -2,
        'getAssists' => 2,
        'toArray' => array(
          'code' => 101,
          'player' => 'name',
          'quotation' => 12
        ),
      )
    ));
  }

  /**
   * @dataProvider badQuotationConfigs
   * @expectedException Exception
   * @expectedExceptionMessage Missing parameter
   * @param Array $config
   */
  public function testBadQuotationConstruct($config) {
    $quotation = new Quotation($config);
  }

  /**
   * @dataProvider goodQuotationConfigs
   * @param Array $config
   */
  public function testGoodQuotationConstruct($config) {
    $quotation = new Quotation($config);
    $this->assertInstanceOf('\FFQP\Quotation', $quotation);
  }

  /**
   * @dataProvider goodQuotationConfigs
   * @param Array $config
   * @param Array $result
   */
  public function testGetCode($config, $result) {
    $quotation = new Quotation($config);
    $this->assertInternalType('integer', $quotation->getCode());
    $this->assertSame($result['getCode'], $quotation->getCode());
  }

  /**
   * @dataProvider goodQuotationConfigs
   * @param Array $config
   * @param Array $result
   */
  public function testGetPlayer($config, $result) {
    $quotation = new Quotation($config);
    $this->assertInternalType('string', $quotation->getPlayer());
    $this->assertSame($result['getPlayer'], $quotation->getPlayer());
  }

  /**
   * @dataProvider goodQuotationConfigs
   * @param Array $config
   * @param Array $result
   */
  public function testGetTeam($config, $result) {
    $quotation = new Quotation($config);
    $this->assertInternalType('string', $quotation->getTeam());
    $this->assertSame($result['getTeam'], $quotation->getTeam());
  }

  /**
   * @dataProvider goodQuotationConfigs
   * @param Array $config
   * @param Array $result
   */
  public function testGetRole($config, $result) {
    $quotation = new Quotation($config);
    $this->assertInternalType('string', $quotation->getRole());
    $this->assertSame($result['getRole'], $quotation->getRole());
  }

  /**
   * @dataProvider goodQuotationConfigs
   * @param Array $config
   * @param Array $result
   */
  public function testGetSecondaryRole($config, $result) {
    $quotation = new Quotation($config);
    $this->assertInternalType('string', $quotation->getSecondaryRole());
    $this->assertSame($result['getSecondaryRole'], $quotation->getSecondaryRole());
  }

  /**
   * @dataProvider goodQuotationConfigs
   * @param Array $config
   * @param Array $result
   */
  public function testGetStatus($config, $result) {
    $quotation = new Quotation($config);
    $this->assertInternalType('string', $quotation->getStatus());
    $this->assertSame($result['getStatus'], $quotation->getStatus());
  }

  /**
   * @dataProvider goodQuotationConfigs
   * @param Array $config
   * @param Array $result
   */
  public function testGetQuotation($config, $result) {
    $quotation = new Quotation($config);
    $this->assertInternalType('integer', $quotation->getQuotation());
    $this->assertSame($result['getQuotation'], $quotation->getQuotation());
  }

  /**
   * @dataProvider goodQuotationConfigs
   * @param Array $config
   * @param Array $result
   */
  public function testGetMagicPoints($config, $result) {
    $quotation = new Quotation($config);
    $this->assertInternalType('float', $quotation->getMagicPoints());
    $this->assertSame($result['getMagicPoints'], $quotation->getMagicPoints());
  }

  /**
   * @dataProvider goodQuotationConfigs
   * @param Array $config
   * @param Array $result
   */
  public function testGetVote($config, $result) {
    $quotation = new Quotation($config);
    $this->assertInternalType('float', $quotation->getVote());
    $this->assertSame($result['getVote'], $quotation->getVote());
  }

  /**
   * @dataProvider goodQuotationConfigs
   * @param Array $config
   * @param Array $result
   */
  public function testGetGoals($config, $result) {
    $quotation = new Quotation($config);
    $this->assertInternalType('integer', $quotation->getGoals());
    $this->assertSame($result['getGoals'], $quotation->getGoals());
  }

  /**
   * @dataProvider goodQuotationConfigs
   * @param Array $config
   * @param Array $result
   */
  public function testGetCautions($config, $result) {
    $quotation = new Quotation($config);
    $this->assertInternalType('float', $quotation->getCautions());
    $this->assertSame($result['getCautions'], $quotation->getCautions());
  }

  /**
   * @dataProvider goodQuotationConfigs
   * @param Array $config
   * @param Array $result
   */
  public function testGetExpulsion($config, $result) {
    $quotation = new Quotation($config);
    $this->assertInternalType('integer', $quotation->getExpulsion());
    $this->assertSame($result['getExpulsion'], $quotation->getExpulsion());
  }

  /**
   * @dataProvider goodQuotationConfigs
   * @param Array $config
   * @param Array $result
   */
  public function testGetPenalties($config, $result) {
    $quotation = new Quotation($config);
    $this->assertInternalType('integer', $quotation->getPenalties());
    $this->assertSame($result['getPenalties'], $quotation->getPenalties());
  }

  /**
   * @dataProvider goodQuotationConfigs
   * @param Array $config
   * @param Array $result
   */
  public function testGetAutoGoals($config, $result) {
    $quotation = new Quotation($config);
    $this->assertInternalType('integer', $quotation->getAutoGoals());
    $this->assertSame($result['getAutoGoals'], $quotation->getAutoGoals());
  }

  /**
   * @dataProvider goodQuotationConfigs
   * @param Array $config
   * @param Array $result
   */
  public function testGetAssists($config, $result) {
    $quotation = new Quotation($config);
    $this->assertInternalType('integer', $quotation->getAssists());
    $this->assertSame($result['getAssists'], $quotation->getAssists());
  }

  /**
   * @dataProvider goodQuotationConfigs
   * @param Array $config
   * @param Array $result
   */
  public function testToArray($config, $result) {
    $quotation = new Quotation($config);
    $quotationToArray = $quotation->toArray($config['fields']);
    $this->assertInternalType('array', $quotationToArray);
    $this->assertEquals(count($config['fields']), count($quotationToArray));
    $this->assertEquals($result['toArray'], $quotationToArray);
  }
}
