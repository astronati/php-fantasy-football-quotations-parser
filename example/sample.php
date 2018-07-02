<?php

require_once __DIR__ . '/../vendor/autoload.php';

use \FFQP\Parser\QuotationsParserFactory;

// Obtain a QuotationsParser
$quotationsParser = QuotationsParserFactory::create(QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2015);

// Get the PlayerData information, ready to be used
$quotations = $quotationsParser->getQuotations('example/files/2017_quotazioni_gazzetta_02.xls');

// Show an example
$output = [
  'Number of quotations: ' . count($quotations),
  'Code: ' . $quotations[441]->getCode(),
  'Player: ' . $quotations[441]->getPlayer(),
  'Team: ' . $quotations[441]->getTeam(),
  'Role: ' . $quotations[441]->getRole(),
  'Secondary Role: ' . $quotations[441]->getSecondaryRole(),
  'Is still active: ' . $quotations[441]->isActive(),
  'Quotation: ' . $quotations[441]->getQuotation(),
  'MagicPoints: ' . $quotations[441]->getMagicPoints(),
  'OriginalMagicPoints: ' . $quotations[441]->getOriginalMagicPoints(),
  'Vote: ' . $quotations[441]->getVote(),
  'Is without vote: ' . $quotations[441]->isWithoutVote(),
  '# of Goals: ' . $quotations[441]->getGoals(),
  'Is cautioned: ' . $quotations[441]->isCautioned(),
  'Is sent off: ' . $quotations[441]->isSentOff(),
  '# of Penalties: ' . $quotations[441]->getPenalties(),
  '# of Auto Goals: ' . $quotations[441]->getAutoGoals(),
  '# of Assists: ' . $quotations[441]->getAssists(),
];

echo implode(PHP_EOL, $output) . PHP_EOL;
