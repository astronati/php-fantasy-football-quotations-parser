<?php

use PHPUnit\Framework\TestCase;
use FFQP\Parser\QuotationsParserFactory;

class QuotationsParserFactoryTest extends TestCase
{
    public function dataProvider()
    {
        return [
          [QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2013],
          [QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2015],
        ];
    }
    
    /**
     * @dataProvider dataProvider
     * @param string $format
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
        $this->expectException(\Exception::class);
        QuotationsParserFactory::create('any_type');
    }
}
