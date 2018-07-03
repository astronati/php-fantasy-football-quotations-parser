<?php

require_once __DIR__ . '/../vendor/autoload.php';

use \FFQP\Parser\QuotationsParserFactory;

// Obtain a QuotationsParser
$quotationsParser = QuotationsParserFactory::create(QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2015);

// Get the PlayerData information, ready to be used
$quotations = $quotationsParser->getQuotations('example/files/2015_quotazioni_gazzetta_25.xls');

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
  'Goals MP: ' . $quotations[441]->getGoalsMagicPoints(),
  '# of Goals: ' . $quotations[441]->getGoals(),
  'Yellow Cards MP: ' . $quotations[441]->getYellowCardMagicPoints(),
  'Is cautioned: ' . $quotations[441]->isCautioned(),
  'Red Cards MP: ' . $quotations[441]->getRedCardMagicPoints(),
  'Is sent off: ' . $quotations[441]->isSentOff(),
  'Penalties MP: ' . $quotations[441]->getPenaltiesMagicPoints(),
  '# of Penalties: ' . $quotations[441]->getPenalties(),
  'Auto Goals MP: ' . $quotations[441]->getAutoGoalsMagicPoints(),
  '# of Auto Goals: ' . $quotations[441]->getAutoGoals(),
  'Assists MP: ' . $quotations[441]->getAssistsMagicPoints(),
  '# of Assists: ' . $quotations[441]->getAssists(),
];

echo implode(PHP_EOL, $output) . PHP_EOL;
