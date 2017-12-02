<?php

/**
 * @author Andrea Stronati <stronati.a@gmail.com>
 * @license MIT http://opensource.org/licenses/MIT
 */

namespace FFQP\Row\Cell;

use \FFQP\Row\Data\RowData;

/**
 * Normalizes the "autoGoals" value
 */
class AutoGoalsNormalizer implements CellNormalizerInterface
{
    /**
     * @inheritdoc
     * @see CellNormalizerInterface::normalize()
     */
    public function normalize($value, RowData $rowData, $format = null): int
    {
        $malus = abs((int)$value);

        // Malus for goalkeeper is -1
        if ($rowData->role == 'P') {
            return $malus;
        }

        // Default malus is -2
        return $malus / 2;
    }
}
