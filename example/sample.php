<?php

require_once __DIR__ . '/../vendor/autoload.php';

use \FFQP\Row\Data\PlayerDataGeneratorFactory;

// Obtain a PlayerDataGenerator
$playerDataGenerator = PlayerDataGeneratorFactory::create(PlayerDataGeneratorFactory::FORMAT_GAZZETTA_SINCE_2015);
// Get the PlayerData information, ready to be used
$playerData = $playerDataGenerator->getPlayerData('example/files/quotazioni_gazzetta_25.xls');
$output = [
    'totale giocatori: ' . count($playerData),
    'Sesto Giocatore (nome): ' . $playerData[6]->player,
    'Sesto Giocatore (magic points): ' . $playerData[6]->magicPoints,
];

echo implode(PHP_EOL, $output) . PHP_EOL;
