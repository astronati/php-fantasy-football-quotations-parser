<?php

use \FFQP\Row\Map\SeasonMap2015 as SeasonMap2015;

/**
 * @codeCoverageIgnore
 */
class SeasonMap2015Test extends PHPUnit_Framework_TestCase {

  public function dataProvider() {
    return array(
      array('code', 1),
      array('player', 2),
      array('team', 3),
      array('role', 4),
      array('secondaryRole', 5),
      array('active', 6),
      array('quotation', 7),
      array('magicPoints', 8),
      array('vote', 9),
      array('goals', 10),
      array('yellowCards', 11),
      array('redCards', 12),
      array('penalties', 13),
      array('autoGoals', 14),
      array('assists', 15),
    );
  }

  /**
   * @dataProvider dataProvider
   * @param array $field
   * @param array $result
   */
  public function testGetOffset($field, $result) {
    $season = new SeasonMap2015();
    $this->assertInternalType('int', $season->getOffset($field));
    $this->assertSame($result, $season->getOffset($field));
  }

  public function testGetCode() {
    $season = new SeasonMap2015();
    $this->assertSame($season->getFields(), [
      'CODE' => 'code',
      'PLAYER' => 'player',
      'TEAM' => 'team',
      'ROLE' => 'role',
      'SECONDARY_ROLE' => 'secondaryRole',
      'ACTIVE' => 'active',
      'QUOTATION' => 'quotation',
      'MAGIC_POINTS' => 'magicPoints',
      'VOTE' => 'vote',
      'GOALS' => 'goals',
      'YELLOW_CARDS' => 'yellowCards',
      'RED_CARDS' => 'redCards',
      'PENALTIES' => 'penalties',
      'AUTOGOALS' => 'autoGoals',
      'ASSISTS' => 'assists',
    ]);
  }
}
