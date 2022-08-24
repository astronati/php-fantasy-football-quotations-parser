<?php

namespace Tests\Parser;

use FFQP\Map\Gazzetta\GazzettaMapSince2013;
use FFQP\Map\Gazzetta\GazzettaMapSince2015;
use FFQP\Map\Gazzetta\GazzettaMapSince2017;
use FFQP\Map\Gazzetta\GazzettaMapSince2019;
use FFQP\Map\Gazzetta\GazzettaMapSince2022;
use FFQP\Map\Gazzetta\GazzettaMapSinceWorldCup2018;
use PHPUnit\Framework\TestCase;
use FFQP\Exception\InvalidFormatException;
use FFQP\Parser\QuotationsParserFactory;

class QuotationsParserFactoryTest extends TestCase
{
    public function dataProvider()
    {
        return [
            [GazzettaMapSince2013::class],
            [GazzettaMapSince2015::class],
            [GazzettaMapSince2017::class],
            [GazzettaMapSinceWorldCup2018::class],
            [GazzettaMapSince2019::class],
            [GazzettaMapSince2022::class],
        ];
    }

    /**
     * @dataProvider dataProvider
     * @param string $format
     * @throws InvalidFormatException
     */
    public function testCreate($format)
    {
        $this->assertInstanceOf(
          'FFQP\Parser\QuotationsParser',
          QuotationsParserFactory::create($format)
        );
    }

    public function testException()
    {
        $this->expectException(InvalidFormatException::class);
        QuotationsParserFactory::create('any_type');
    }
}
