<?php

/**
 * @author Andrea Stronati <stronati.a@gmail.com>
 * @license MIT http://opensource.org/licenses/MIT
 */

namespace FFQP\Row\Cell;

use \FFQP\Row\Data\RowData;

/**
 * Normalizes the "yellowCards" value
 */
class YellowCardsNormalizer implements CellNormalizerInterface
{
    /**
     * @inheritdoc
     * @see CellNormalizerInterface::normalize()
     */
    public function normalize($value, RowData $rowData, $format = null): int
    {
        return (int)(abs((float)str_replace(',', '.', $value)) / 0.5);
    }
}
