<?php

namespace Tests\Parser;

use PHPUnit\Framework\TestCase;
use FFQP\Exception\InvalidFormatException;
use FFQP\Parser\QuotationsParserFactory;

class QuotationsParserFactoryTest extends TestCase
{
    public function dataProvider()
    {
        return [
          [QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2013],
          [QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2015],
          [QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2017],
          [QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_WORLD_CUP_2018],
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
