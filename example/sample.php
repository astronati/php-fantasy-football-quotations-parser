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
  'Code: ' . $quotations[502]->getCode(),
  'Player: ' . $quotations[502]->getPlayer(),
  'Team: ' . $quotations[502]->getTeam(),
  'Role: ' . $quotations[502]->getRole(),
  'Secondary Role: ' . $quotations[502]->getSecondaryRole(),
  'Is still active: ' . $quotations[502]->isActive(),
  'Quotation: ' . $quotations[502]->getQuotation(),
  'MagicPoints: ' . $quotations[502]->getMagicPoints(),
  'OriginalMagicPoints: ' . $quotations[502]->getOriginalMagicPoints(),
  'Vote: ' . $quotations[502]->getVote(),
  'Is without vote: ' . $quotations[502]->isWithoutVote(),
  '# of Goals: ' . $quotations[502]->getGoals(),
  'Is cautioned: ' . $quotations[502]->isCautioned(),
  'Is sent off: ' . $quotations[502]->isSentOff(),
  '# of Penalties: ' . $quotations[502]->getPenalties(),
  '# of Auto Goals: ' . $quotations[502]->getAutoGoals(),
  '# of Assists: ' . $quotations[502]->getAssists(),
];

echo implode(PHP_EOL, $output) . PHP_EOL;
