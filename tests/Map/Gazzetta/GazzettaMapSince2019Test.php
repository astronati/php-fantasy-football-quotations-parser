<?php

namespace Tests\Map\Gazzetta;

use FFQP\Map\Gazzetta\GazzettaMapSince2019;
use PHPUnit\Framework\TestCase;

class GazzettaMapSince2019Test extends TestCase
{
    public function testExtractRows()
    {
        $map = new GazzettaMapSince2019();
        $rows = $map->extractRows('tests/fixtures/2019_quotazioni_gazzetta_22.xls');

        $this->assertSame(732, count($rows));

        // First Footballer
        $this->assertSame('126', $rows[26]->code);
        $this->assertSame('LOPEZ Pau', $rows[26]->player);
        $this->assertSame('ROMA', $rows[26]->team);
        $this->assertSame('P', $rows[26]->role);
        $this->assertSame('P', $rows[26]->secondaryRole);
        $this->assertSame('SI', $rows[26]->status);
        $this->assertSame('17', $rows[26]->quotation);
        $this->assertSame('7.5', $rows[26]->magicPoints);
        $this->assertSame('6.5', $rows[26]->vote);
        $this->assertSame('0', $rows[26]->goals);
        $this->assertSame('0', $rows[26]->yellowCards);
        $this->assertSame('0', $rows[26]->redCards);
        $this->assertSame('0', $rows[26]->penalties);
        $this->assertSame('0', $rows[26]->autoGoals);
        $this->assertSame('0', $rows[26]->assists);

        // Footballer without a vote
        $this->assertSame('247', $rows[128]->code);
        $this->assertSame('CUADRADO Juan', $rows[128]->player);
        $this->assertSame('JUVENTUS', $rows[128]->team);
        $this->assertSame('D', $rows[128]->role);
        $this->assertSame('D', $rows[128]->secondaryRole);
        $this->assertSame('SI', $rows[128]->status);
        $this->assertSame('18', $rows[128]->quotation);
        $this->assertSame('5.5', $rows[128]->magicPoints);
        $this->assertSame('6', $rows[128]->vote);
        $this->assertSame('0', $rows[128]->goals);
        $this->assertSame('1', $rows[128]->yellowCards);
        $this->assertSame('0', $rows[128]->redCards);
        $this->assertSame('0', $rows[128]->penalties);
        $this->assertSame('0', $rows[128]->autoGoals);
        $this->assertSame('0', $rows[128]->assists);
    }
}
