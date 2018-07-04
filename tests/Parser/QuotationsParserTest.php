<?php

namespace Tests\Parser;

use PHPUnit\Framework\TestCase;
use FFQP\Parser\QuotationsParser;

class QuotationsParserTest extends TestCase
{
    public function testGetQuotations()
    {
        $map = $this->getMockBuilder('FFQP\Map\Gazzetta\GazzettaMapSince2013')
          ->setMethods(['extractRows'])
          ->disableOriginalConstructor()
          ->getMock();
        $map->method('extractRows')->willReturn([
          $this->getMockBuilder('FFQP\Map\Row\Row')
            ->disableOriginalConstructor()
            ->getMock()
        ]);

        $normalizer = $this->getMockBuilder('FFQP\Map\Row\Normalizer\RowNormalizer')
          ->setMethods(['normalize'])
          ->disableOriginalConstructor()
          ->getMock();
        $normalizer->method('normalize')->willReturn(
          $this->getMockBuilder('FFQP\Model\Quotation')
            ->disableOriginalConstructor()
            ->getMock()
        );

        $parser = new QuotationsParser($map, $normalizer);
        $quotations = $parser->getQuotations('path');

        $this->assertInstanceOf('FFQP\Model\Quotation', $quotations[0]);
    }
}
