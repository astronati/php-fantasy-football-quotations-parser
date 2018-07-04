<?php

require_once __DIR__ . '/../vendor/autoload.php';

use \FFQP\Parser\QuotationsParserFactory;

// Obtain a QuotationsParser
$quotationsParser = QuotationsParserFactory::create(QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_WORLD_CUP_2018);

// Get the PlayerData information, ready to be used
$quotations = $quotationsParser->getQuotations('example/files/2018_quotazioni_gazzetta_mm_03.xls');

// Show an example
$output = [
  'Number of quotations: ' . count($quotations),
  'Code: ' . $quotations[56]->getCode(),
  'Player: ' . $quotations[56]->getPlayer(),
  'Team: ' . $quotations[56]->getTeam(),
  'Role: ' . $quotations[56]->getRole(),
  'Secondary Role: ' . $quotations[56]->getSecondaryRole(),
  'Is still active: ' . $quotations[56]->isActive(),
  'Quotation: ' . $quotations[56]->getQuotation(),
  'MagicPoints: ' . $quotations[56]->getMagicPoints(),
  'OriginalMagicPoints: ' . $quotations[56]->getOriginalMagicPoints(),
  'Vote: ' . $quotations[56]->getVote(),
  'Is without vote: ' . $quotations[56]->isWithoutVote(),
  'Goals MP: ' . $quotations[56]->getGoalsMagicPoints(),
  '# of Goals: ' . $quotations[56]->getGoals(),
  'Yellow Cards MP: ' . $quotations[56]->getYellowCardMagicPoints(),
  'Is cautioned: ' . $quotations[56]->isCautioned(),
  'Red Cards MP: ' . $quotations[56]->getRedCardMagicPoints(),
  'Is sent off: ' . $quotations[56]->isSentOff(),
  'Penalties MP: ' . $quotations[56]->getPenaltiesMagicPoints(),
  '# of Penalties: ' . $quotations[56]->getPenalties(),
  'Auto Goals MP: ' . $quotations[56]->getAutoGoalsMagicPoints(),
  '# of Auto Goals: ' . $quotations[56]->getAutoGoals(),
  'Assists MP: ' . $quotations[56]->getAssistsMagicPoints(),
  '# of Assists: ' . $quotations[56]->getAssists(),
];

echo implode(PHP_EOL, $output) . PHP_EOL;
