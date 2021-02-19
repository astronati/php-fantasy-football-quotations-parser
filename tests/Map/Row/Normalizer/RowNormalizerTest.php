<?php

namespace Tests\Map\Row\Normalizer;

use PHPUnit\Framework\TestCase;
use FFQP\Map\Row\Normalizer\RowNormalizer;
use FFQP\Map\Row\Normalizer\Field\RowFieldNormalizerFactory;
use FFQP\Map\Row\Row;

class RowNormalizerTest extends TestCase
{

    public function dataProvider()
    {
        return [
          [
            ['101', 'player', 'team', 'T', 'C', '0', '6', '5.5', 'S.V.', '2', '1', '1', '1', '1', '1'],
            5.5,
            true,
            true
          ],
        ];
    }

    /**
     * @dataProvider dataProvider
     * @param array $config
     * @param float $magicPoints
     * @param bool $isWithoutVote
     * @param bool $isCautioned
     */
    public function testNormalize($config, $magicPoints, $isWithoutVote, $isCautioned)
    {
        $rowNormalizer = new RowNormalizer(
          1,
          new RowFieldNormalizerFactory()
        );

        $row = new Row(
          $config[0],
          $config[1],
          $config[2],
          $config[3],
          $config[4],
          $config[5],
          $config[6],
          $config[7],
          $config[8],
          $config[9],
          $config[10],
          $config[11],
          $config[12],
          $config[13],
          $config[14]
        );

        $quotation = $rowNormalizer->normalize($row);
        $this->assertSame($magicPoints, $quotation->getMagicPoints());
        $this->assertSame($isWithoutVote, $quotation->isWithoutVote());
        $this->assertSame($isCautioned, $quotation->isCautioned());
    }
}
