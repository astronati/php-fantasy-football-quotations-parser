<?php

use \FFQP\Row\Map\SeasonMap2013 as SeasonMap2013;

/**
 * @codeCoverageIgnore
 */
class SeasonMap2013Test extends PHPUnit_Framework_TestCase
{
    
    public function dataProvider()
    {
        return array(
          array('code', 1),
          array('player', 2),
          array('team', 3),
          array('role', 4),
          array('secondaryRole', 4),
          array('active', 5),
          array('quotation', 6),
          array('magicPoints', 7),
          array('vote', 8),
          array('goals', 9),
          array('yellowCards', 10),
          array('redCards', 11),
          array('penalties', 12),
          array('autoGoals', 13),
          array('assists', 14),
        );
    }
    
    /**
     * @dataProvider dataProvider
     * @param array $field
     * @param array $result
     */
    public function testGetOffset($field, $result)
    {
        $season = new SeasonMap2013();
        $this->assertInternalType('int', $season->getOffset($field));
        $this->assertSame($result, $season->getOffset($field));
    }
    
    public function testGetCode()
    {
        $season = new SeasonMap2013();
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
