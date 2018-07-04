<?php

namespace Tests\Map\Gazzetta;

use PHPUnit\Framework\TestCase;
use FFQP\Map\Gazzetta\GazzettaMapSince2017;

class GazzettaMapSince2017Test extends TestCase
{
    public function testExtractRows()
    {
        $map = new GazzettaMapSince2017();
        $this->assertInternalType('int', 3);
        $rows = $map->extractRows('tests/fixtures/2017_quotazioni_gazzetta_02.xls');

        $this->assertSame(634, count($rows));

        // First Footballer
        $this->assertSame('100', $rows[0]->code);
        $this->assertSame('ALISSON ', $rows[0]->player);
        $this->assertSame('ROMA', $rows[0]->team);
        $this->assertSame('P', $rows[0]->role);
        $this->assertSame('P', $rows[0]->secondaryRole);
        $this->assertSame('SI', $rows[0]->status);
        $this->assertSame('14', $rows[0]->quotation);
        $this->assertSame('3', $rows[0]->magicPoints);
        $this->assertSame('6', $rows[0]->vote);
        $this->assertSame('-3', $rows[0]->goals);
        $this->assertSame('0', $rows[0]->yellowCards);
        $this->assertSame('0', $rows[0]->redCards);
        $this->assertSame('0', $rows[0]->penalties);
        $this->assertSame('0', $rows[0]->autoGoals);
        $this->assertSame('0', $rows[0]->assists);

        // Footballer without a vote
        $this->assertSame('804', $rows[505]->code);
        $this->assertSame('BOYÉ Lucas', $rows[505]->player);
        $this->assertSame('TORINO', $rows[505]->team);
        $this->assertSame('T', $rows[505]->role);
        $this->assertSame('A', $rows[505]->secondaryRole);
        $this->assertSame('SI', $rows[505]->status);
        $this->assertSame('7', $rows[505]->quotation);
        $this->assertSame('-', $rows[505]->magicPoints);
        $this->assertSame('-', $rows[505]->vote);
        $this->assertSame('', $rows[505]->goals);
        $this->assertSame('', $rows[505]->yellowCards);
        $this->assertSame('', $rows[505]->redCards);
        $this->assertSame('', $rows[505]->penalties);
        $this->assertSame('', $rows[505]->autoGoals);
        $this->assertSame('', $rows[505]->assists);
    }
}
