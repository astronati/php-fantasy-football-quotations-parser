<?php

class QuotationTest extends PHPUnit_Framework_TestCase {

    /**
     * @dataProvider badQuotatonConfigs
     * @expectedException Exception
     */
    public function testBadQuotationConstruct($config) {
        $quotation = new Quotation($config);
    }

  /**
   * @dataProvider goodQuotationConfigs
   */
  public function testGoodQuotationConstruct($config) {
    $quotation = new Quotation($config);
    $this->assertInstanceOf('Quotation', $quotation);
  }

  /**
   * @dataProvider goodQuotationConfigs
   */
  public function testGetCode($config) {
    $quotation = new Quotation($config);
    $this->assertInternalType('integer', $quotation->getCode());
    $this->assertSame(1, $quotation->getCode());
  }

  /**
   * @dataProvider goodQuotationConfigs
   */
  public function testGetPlayer($config) {
    $quotation = new Quotation($config);
    $this->assertInternalType('string', $quotation->getPlayer());
    $this->assertSame('1', $quotation->getPlayer());
  }

  /**
   * @dataProvider goodQuotationConfigs
   */
  public function testGetTeam($config) {
    $quotation = new Quotation($config);
    $this->assertInternalType('string', $quotation->getTeam());
    $this->assertSame('1', $quotation->getTeam());
  }

  /**
   * @dataProvider goodQuotationConfigs
   */
  public function testGetRole($config) {
    $quotation = new Quotation($config);
    $this->assertInternalType('string', $quotation->getRole());
    $this->assertSame('1', $quotation->getRole());
  }

  /**
   * @dataProvider goodQuotationConfigs
   */
  public function testGetStatus($config) {
    $quotation = new Quotation($config);
    $this->assertInternalType('integer', $quotation->getStatus());
  }

  /**
   * @dataProvider goodQuotationConfigs
   */
  public function testGetQuotation($config) {
    $quotation = new Quotation($config);
    $this->assertInternalType('integer', $quotation->getQuotation());
  }

  /**
   * @dataProvider goodQuotationConfigs
   */
  public function testGetMagicPoints($config) {
    $quotation = new Quotation($config);
    $this->assertInternalType('float', $quotation->getMagicPoints());
  }

  /**
   * @dataProvider goodQuotationConfigs
   */
  public function testGetVote($config) {
    $quotation = new Quotation($config);
    $this->assertInternalType('float', $quotation->getVote());
  }

  /**
   * @dataProvider goodQuotationConfigs
   */
  public function testGetCaution($config) {
    $quotation = new Quotation($config);
    $this->assertInternalType('float', $quotation->getCaution());
  }

  /**
   * @dataProvider goodQuotationConfigs
   */
  public function testGetDismissal($config) {
    $quotation = new Quotation($config);
    $this->assertInternalType('integer', $quotation->getDismissal());
  }

  /**
   * @dataProvider goodQuotationConfigs
   */
  public function testGetPenalties($config) {
    $quotation = new Quotation($config);
    $this->assertInternalType('integer', $quotation->getPenalties());
  }

  /**
   * @dataProvider goodQuotationConfigs
   */
  public function testGetAutoGoals($config) {
    $quotation = new Quotation($config);
    $this->assertInternalType('integer', $quotation->getAutoGoals());
  }

  /**
   * @dataProvider goodQuotationConfigs
   */
  public function testGetAssists($config) {
    $quotation = new Quotation($config);
    $this->assertInternalType('integer', $quotation->getAssists());
  }

  /**
   * @dataProvider goodQuotationConfigs
   */
  public function testToArray($config) {
    $quotation = new Quotation($config);
    $quotationToArray = $quotation->toArray(array(
      'code', 'player', 'team'
    ));
    $this->assertInternalType('array', $quotationToArray);
    $this->assertEquals(3, count($quotationToArray));
  }

  public function goodQuotationConfigs() {
    return array(array(array(
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
      'dismissals' => '1',
      'penalties' => '1',
      'autoGoals' => '1',
      'assists' => '1',
    )));
  }

    public function badQuotatonConfigs() {
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
                'dismissals' => 1,
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
                'dismissals' => 1,
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
                'dismissals' => 1,
                'penalties' => 1,
                'autoGoals' => 1,
            )),
        );
    }
}
