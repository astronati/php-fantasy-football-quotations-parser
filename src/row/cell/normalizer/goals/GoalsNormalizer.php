<?php

/**
 * @author Andrea Stronati <stronati.a@gmail.com>
 * @license MIT http://opensource.org/licenses/MIT
 */

namespace FFQP\Row\Cell;

use \FFQP\Row\Data\PlayerDataGeneratorFactory;
use \FFQP\Row\Data\RowData;

/**
 * Normalizes the "goals" value
 */
class GoalsNormalizer implements CellNormalizerInterface
{
    /**
     * @inheritdoc
     * @see CellNormalizerInterface::normalize()
     */
    public function normalize($value, RowData $rowData, $format = null): int
    {
        $malus = 0;
        $bonus = (float)$value;

        if ($bonus == 0) {
            return 0;
        }

        if ($bonus < 0) {
            $malus = $bonus;
        }

        // Malus for goalkeepers per each gol is -1
        if ($malus < 0 && $rowData->role == $rowData::GOALKEEPER) {
            return abs($malus);
        }

        if ($format == PlayerDataGeneratorFactory::FORMAT_GAZZETTA_SINCE_2015) {
            switch ($rowData->secondaryRole) {
                case $rowData::GOALKEEPER:
                    return $bonus / 5;
                case $rowData::DEFENDER:
                    return $bonus / 4.5;
                case $rowData::MIDFIELDER:
                    return $bonus / 4;
                case $rowData::PLAYMAKER:
                    return $bonus / 3.5;
                case $rowData::FORWARD:
                    return $bonus / 3;
            }
        }

        return $bonus / 3;
    }
}
