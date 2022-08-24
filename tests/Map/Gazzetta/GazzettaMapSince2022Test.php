<?php

namespace Tests\Map\Gazzetta;

use FFQP\Map\Gazzetta\GazzettaMapSince2019;
use PHPUnit\Framework\TestCase;

class GazzettaMapSince2022Test extends TestCase
{
    public function testExtractRows()
    {
        $map = new GazzettaMapSince2019();
        $rows = $map->extractRows('tests/fixtures/2022_quotazioni_gazzetta_01.xlsx');

        $this->assertSame(640, count($rows));

        // First Footballer
        $this->assertSame('382', $rows[280]->code);
        $this->assertSame('TOLOI Rafael', $rows[280]->player);
        $this->assertSame('ATALANTA', $rows[280]->team);
        $this->assertSame('D', $rows[280]->role);
        $this->assertSame('D', $rows[280]->secondaryRole);
        $this->assertSame('SI', $rows[280]->status);
        $this->assertSame('25', $rows[280]->quotation);
        $this->assertSame('9.5', $rows[280]->magicPoints);
        $this->assertSame('6.5', $rows[280]->vote);
        $this->assertSame('1', $rows[280]->goals);
        $this->assertSame('0', $rows[280]->yellowCards);
        $this->assertSame('0', $rows[280]->redCards);
        $this->assertSame('0', $rows[280]->penalties);
        $this->assertSame('0', $rows[280]->autoGoals);
        $this->assertSame('0', $rows[280]->assists);
    }
}
