<?php

use \FFQP\Row\Map\SeasonMap2013 as SeasonMap2013;

/**
 * @codeCoverageIgnore
 */
class SeasonMap2013Test extends PHPUnit_Framework_TestCase
{

    public function dataProvider()
    {
        return [
          ['code', 1],
          ['player', 2],
          ['team', 3],
          ['role', 4],
          ['secondaryRole', 4],
          ['active', 5],
          ['quotation', 6],
          ['magicPoints', 7],
          ['vote', 8],
          ['goals', 9],
          ['yellowCards', 10],
          ['redCards', 11],
          ['penalties', 12],
          ['autoGoals', 13],
          ['assists', 14],
        ];
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
