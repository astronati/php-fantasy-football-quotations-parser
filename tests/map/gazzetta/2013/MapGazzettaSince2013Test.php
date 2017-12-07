<?php

use PHPUnit\Framework\TestCase;
use FFQP\Map\MapGazzettaSince2013;

class MapGazzettaSince2013Test extends TestCase
{
    public function testExtractRows()
    {
        $map = new MapGazzettaSince2013();
        $this->assertInternalType('int', 3);
        $rows = $map->extractRows('tests/fixtures/2014_quotazioni_gazzetta_01.xls');
        
        $this->assertSame(666, count($rows));
        
        // Footballer with a vote
        $this->assertSame('106', $rows[6]->code);
        $this->assertSame('BARDI', $rows[6]->player);
        $this->assertSame('CHIEVO', $rows[6]->team);
        $this->assertSame('P', $rows[6]->role);
        $this->assertSame('P', $rows[6]->secondaryRole);
        $this->assertSame('1', $rows[6]->status);
        $this->assertSame('8', $rows[6]->quotation);
        $this->assertSame('4', $rows[6]->magicPoints);
        $this->assertSame('5', $rows[6]->vote);
        $this->assertSame('-1', $rows[6]->goals);
        $this->assertSame('0', $rows[6]->yellowCards);
        $this->assertSame('0', $rows[6]->redCards);
        $this->assertSame('0', $rows[6]->penalties);
        $this->assertSame('0', $rows[6]->autoGoals);
        $this->assertSame('0', $rows[6]->assists);
        
        // Footballer without a vote
        $this->assertSame('105', $rows[5]->code);
        $this->assertSame('AVRAMOV', $rows[5]->player);
        $this->assertSame('ATALANTA', $rows[5]->team);
        $this->assertSame('P', $rows[5]->role);
        $this->assertSame('P', $rows[5]->secondaryRole);
        $this->assertSame('1', $rows[5]->status);
        $this->assertSame('1', $rows[5]->quotation);
        $this->assertSame('-', $rows[5]->magicPoints);
        $this->assertSame('-', $rows[5]->vote);
        $this->assertSame('', $rows[5]->goals);
        $this->assertSame('', $rows[5]->yellowCards);
        $this->assertSame('', $rows[5]->redCards);
        $this->assertSame('', $rows[5]->penalties);
        $this->assertSame('', $rows[5]->autoGoals);
        $this->assertSame('', $rows[5]->assists);
    }
}
