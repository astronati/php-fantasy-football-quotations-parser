<?php

use PHPUnit\Framework\TestCase;
use FFQP\Map\Gazzetta\GazzettaMapSince2013;

class GazzettaMapSince2013Test extends TestCase
{
    public function testExtractRows()
    {
        $map = new GazzettaMapSince2013();
        $this->assertInternalType('int', 3);
        $rows = $map->extractRows('tests/fixtures/2014_quotazioni_gazzetta_01.xls');

        $this->assertSame(665, count($rows));

        // First Footballer
        $this->assertSame('101', $rows[0]->code);
        $this->assertSame('ABBIATI', $rows[0]->player);
        $this->assertSame('MILAN', $rows[0]->team);
        $this->assertSame('P', $rows[0]->role);
        $this->assertSame('P', $rows[0]->secondaryRole);
        $this->assertSame('1', $rows[0]->status);
        $this->assertSame('12', $rows[0]->quotation);
        $this->assertSame('-', $rows[0]->magicPoints);
        $this->assertSame('-', $rows[0]->vote);
        $this->assertSame('', $rows[0]->goals);
        $this->assertSame('', $rows[0]->yellowCards);
        $this->assertSame('', $rows[0]->redCards);
        $this->assertSame('', $rows[0]->penalties);
        $this->assertSame('', $rows[0]->autoGoals);
        $this->assertSame('', $rows[0]->assists);

        // Footballer with a vote
        $this->assertSame('106', $rows[5]->code);
        $this->assertSame('BARDI', $rows[5]->player);
        $this->assertSame('CHIEVO', $rows[5]->team);
        $this->assertSame('P', $rows[5]->role);
        $this->assertSame('P', $rows[5]->secondaryRole);
        $this->assertSame('1', $rows[5]->status);
        $this->assertSame('8', $rows[5]->quotation);
        $this->assertSame('4', $rows[5]->magicPoints);
        $this->assertSame('5', $rows[5]->vote);
        $this->assertSame('-1', $rows[5]->goals);
        $this->assertSame('0', $rows[5]->yellowCards);
        $this->assertSame('0', $rows[5]->redCards);
        $this->assertSame('0', $rows[5]->penalties);
        $this->assertSame('0', $rows[5]->autoGoals);
        $this->assertSame('0', $rows[5]->assists);

        // Footballer without a vote
        $this->assertSame('105', $rows[4]->code);
        $this->assertSame('AVRAMOV', $rows[4]->player);
        $this->assertSame('ATALANTA', $rows[4]->team);
        $this->assertSame('P', $rows[4]->role);
        $this->assertSame('P', $rows[4]->secondaryRole);
        $this->assertSame('1', $rows[4]->status);
        $this->assertSame('1', $rows[4]->quotation);
        $this->assertSame('-', $rows[4]->magicPoints);
        $this->assertSame('-', $rows[4]->vote);
        $this->assertSame('', $rows[4]->goals);
        $this->assertSame('', $rows[4]->yellowCards);
        $this->assertSame('', $rows[4]->redCards);
        $this->assertSame('', $rows[4]->penalties);
        $this->assertSame('', $rows[4]->autoGoals);
        $this->assertSame('', $rows[4]->assists);
    }
}
