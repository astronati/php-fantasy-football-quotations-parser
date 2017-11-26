<?php

/**
 * @author Andrea Stronati <stronati.a@gmail.com>
 * @license MIT http://opensource.org/licenses/MIT
 */

namespace FFQP\Row\Cell;

use \FFQP\Row\Cell\CellNormalizerInterface as CellNormalizerInterface;
use \FFQP\Row\Data\RawData as RawData;

/**
 * Normalizes the "autoGoals" value
 */
class AutoGoalsNormalizer implements CellNormalizerInterface
{
    /**
     * @inheritdoc
     * @see CellNormalizerInterface::normalize()
     */
    public function normalize($value, RawData $rawData, $season = null): int
    {
        $malus = abs((int)$value);

        // Malus for goalkeeper is -1
        if ($rawData->role == 'P') {
            return $malus;
        }

        // Default malus is -2
        return $malus / 2;
    }
}
