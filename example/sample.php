<?php

require_once __DIR__ . '/../vendor/php-excel-reader/spreadsheet-reader/src/PHPExcelReader/SpreadsheetReader.php';
require_once 'lib/CustomReader.php';
require_once __DIR__ . '/../vendor/autoload.php';

use \FFQP\Parser\Parser as Parser;
use \FFQP\Row\Cell\CellNormalizerFactory as CellNormalizerFactory;
use \FFQP\Row\Data\DataFactory as DataFactory;
use \FFQP\Row\Data\RawDataFactory as RawDataFactory;
use \FFQP\Row\Map\RowMapFactory as RowMapFactory;
use \FFQP\Row\RowNormalizer as RowNormalizer;

$reader = new CustomReader(new \PHPExcelReader\SpreadsheetReader('example/files/quotazioni_gazzetta_25.xls'));

$parser = new Parser(
  $reader,
  RowMapFactory::create('2015'),
  new RowNormalizer(new DataFactory(), new CellNormalizerFactory()),
  new RawDataFactory()
);

$output = [
  $reader->read(1, 1),
  'Row Count: ' . $reader->getRowCount(),
  'Sesto Giocatore (nome): ' . $parser->getData()[6]->player,
  'Sesto Giocatore (MP): ' . $parser->getData()[6]->magicPoints,
];
echo implode(PHP_EOL, $output);
echo PHP_EOL;
