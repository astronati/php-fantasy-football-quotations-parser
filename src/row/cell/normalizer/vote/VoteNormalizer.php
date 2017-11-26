<?php

/**
 * @author Andrea Stronati <stronati.a@gmail.com>
 * @license MIT http://opensource.org/licenses/MIT
 */

namespace FFQP\Row\Cell;

use \FFQP\Row\Cell\CellNormalizerInterface as CellNormalizerInterface;
use \FFQP\Row\Data\RawData as RawData;

/**
 * Normalizes the "vote" value
 */
class VoteNormalizer implements CellNormalizerInterface
{
    /**
     * @inheritdoc
     * @see CellNormalizerInterface::normalize()
     */
    public function normalize($value, RawData $rawData, $season = null): ?float
    {
        $bonus = (float)str_replace(',', '.', $value);
        if ($value == 'S.V.' || $bonus == 0) {
            return null;
        }
        return $bonus;
    }
}
