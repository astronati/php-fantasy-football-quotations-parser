<?php

namespace Tests\Map\Gazzetta;

use PHPUnit\Framework\TestCase;
use FFQP\Map\Gazzetta\GazzettaMapSince2015;

class GazzettaMapSince2015Test extends TestCase
{
    public function testExtractRows()
    {
        $map = new GazzettaMapSince2015();
        $rows = $map->extractRows('tests/fixtures/2015_quotazioni_gazzetta_25.xls');

        $this->assertSame(694, count($rows));

        // First Footballer
        $this->assertSame('101', $rows[0]->code);
        $this->assertSame('ABBIATI Christian', $rows[0]->player);
        $this->assertSame('Milan', $rows[0]->team);
        $this->assertSame('P', $rows[0]->role);
        $this->assertSame('P', $rows[0]->secondaryRole);
        $this->assertSame('SI', $rows[0]->status);
        $this->assertSame('1', $rows[0]->quotation);
        $this->assertSame('-', $rows[0]->magicPoints);
        $this->assertSame('-', $rows[0]->vote);
        $this->assertSame('', $rows[0]->goals);
        $this->assertSame('', $rows[0]->yellowCards);
        $this->assertSame('', $rows[0]->redCards);
        $this->assertSame('', $rows[0]->penalties);
        $this->assertSame('', $rows[0]->autoGoals);
        $this->assertSame('', $rows[0]->assists);

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
