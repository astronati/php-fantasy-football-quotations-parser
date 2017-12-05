<?php

/**
 * @author Andrea Stronati <stronati.a@gmail.com>
 * @license MIT http://opensource.org/licenses/MIT
 */

namespace FFQP\Parser;

use FFQP\Row\Data\PlayerData;

/**
 * A tool to read a spreadsheet in order to return data per each footballer.
 */
interface PlayerDataParserInterface
{
    /**
     * Given a $filePath, it parses and returns an array of PlayerData
     * @param string $filePath
     * @return PlayerData[] An array of PlayerData instances.
     */
    public function getPlayerData(string $filePath): array;
}
