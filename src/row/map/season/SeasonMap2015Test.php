<?php

use \FFQP\Row\Map\SeasonMap2015 as SeasonMap2015;

/**
 * @codeCoverageIgnore
 */
class SeasonMap2015Test extends PHPUnit_Framework_TestCase
{
    
    public function dataProvider()
    {
        return [
          ['code', 1],
          ['player', 2],
          ['team', 3],
          ['role', 4],
          ['secondaryRole', 5],
          ['active', 6],
          ['quotation', 7],
          ['magicPoints', 8],
          ['vote', 9],
          ['goals', 10],
          ['yellowCards', 11],
          ['redCards', 12],
          ['penalties', 13],
          ['autoGoals', 14],
          ['assists', 15],
        ];
    }
    
    /**
     * @dataProvider dataProvider
     * @param array $field
     * @param array $result
     */
    public function testGetOffset($field, $result)
    {
        $season = new SeasonMap2015();
        $this->assertInternalType('int', $season->getOffset($field));
        $this->assertSame($result, $season->getOffset($field));
    }
    
    public function testGetCode()
    {
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
