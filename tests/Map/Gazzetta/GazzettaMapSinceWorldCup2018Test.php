<?php

namespace Tests\Map\Gazzetta;

use PHPUnit\Framework\TestCase;
use FFQP\Map\Gazzetta\GazzettaMapSinceWorldCup2018;

class GazzettaMapSinceWorldCup2018Test extends TestCase
{
    public function testExtractRows()
    {
        $map = new GazzettaMapSinceWorldCup2018();
        $this->assertInternalType('int', 3);
        $rows = $map->extractRows('tests/fixtures/2018_quotazioni_gazzetta_mm_03.xls');

        $this->assertSame(769, count($rows));

        // First Footballer
        $this->assertSame('104', $rows[4]->code);
        $this->assertSame('AL-MOSAILEM Yasser', $rows[4]->player);
        $this->assertSame('ARABIA SAUDITA', $rows[4]->team);
        $this->assertSame('P', $rows[4]->role);
        $this->assertSame('P', $rows[4]->secondaryRole);
        $this->assertSame('NO', $rows[4]->status);
        $this->assertSame('4', $rows[4]->quotation);
        $this->assertSame('-', $rows[4]->magicPoints);
        $this->assertSame('6', $rows[4]->vote);
        $this->assertSame('-1', $rows[4]->goals);
        $this->assertSame('0', $rows[4]->yellowCards);
        $this->assertSame('0', $rows[4]->redCards);
        $this->assertSame('0', $rows[4]->penalties);
        $this->assertSame('0', $rows[4]->autoGoals);
        $this->assertSame('0', $rows[4]->assists);

        // Footballer without a vote
        $this->assertSame('415', $rows[312]->code);
        $this->assertSame('WASTON Kendall', $rows[312]->player);
        $this->assertSame('COSTA RICA', $rows[312]->team);
        $this->assertSame('D', $rows[312]->role);
        $this->assertSame('D', $rows[312]->secondaryRole);
        $this->assertSame('NO', $rows[312]->status);
        $this->assertSame('2', $rows[312]->quotation);
        $this->assertSame('-', $rows[312]->magicPoints);
        $this->assertSame('6.5', $rows[312]->vote);
        $this->assertSame('1', $rows[312]->goals);
        $this->assertSame('1', $rows[312]->yellowCards);
        $this->assertSame('0', $rows[312]->redCards);
        $this->assertSame('0', $rows[312]->penalties);
        $this->assertSame('0', $rows[312]->autoGoals);
        $this->assertSame('0', $rows[312]->assists);
    }
}
