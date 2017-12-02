<?php

/**
 * @author Andrea Stronati <stronati.a@gmail.com>
 * @license MIT http://opensource.org/licenses/MIT
 */

namespace FFQP\Row\Cell;

use \FFQP\Row\Data\RowData;

/**
 * Normalizes the "vote" value
 */
class VoteNormalizer implements CellNormalizerInterface
{
    /**
     * @inheritdoc
     * @see CellNormalizerInterface::normalize()
     */
    public function normalize($value, RowData $rowData, $format = null): ?float
    {
        $bonus = (float)str_replace(',', '.', $value);
        if ($value == 'S.V.' || $bonus == 0) {
            return null;
        }
        return $bonus;
    }
}
