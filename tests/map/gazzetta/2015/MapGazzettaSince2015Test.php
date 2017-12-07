<?php

use PHPUnit\Framework\TestCase;
use FFQP\Map\MapGazzettaSince2015;

class MapGazzettaSince2015Test extends TestCase
{
    public function testExtractRows()
    {
        $map = new MapGazzettaSince2015();
        $this->assertInternalType('int', 3);
        $rows = $map->extractRows('tests/fixtures/2015_quotazioni_gazzetta_25.xls');

        $this->assertSame(694, count($rows));

        // Footballer with a vote
        $this->assertSame('704', $rows[509]->code);
        $this->assertSame('PERISIC Ivan', $rows[509]->player);
        $this->assertSame('Inter', $rows[509]->team);
        $this->assertSame('T', $rows[509]->role);
        $this->assertSame('C', $rows[509]->secondaryRole);
        $this->assertSame('SI', $rows[509]->status);
        $this->assertSame('18', $rows[509]->quotation);
        $this->assertSame('5.5', $rows[509]->magicPoints);
        $this->assertSame('S.V.', $rows[509]->vote);
        $this->assertSame('0', $rows[509]->goals);
        $this->assertSame('0', $rows[509]->yellowCards);
        $this->assertSame('0', $rows[509]->redCards);
        $this->assertSame('0', $rows[509]->penalties);
        $this->assertSame('0', $rows[509]->autoGoals);
        $this->assertSame('0', $rows[509]->assists);
    }
}
