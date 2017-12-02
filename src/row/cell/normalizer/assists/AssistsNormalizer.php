<?php

/**
 * @author Andrea Stronati <stronati.a@gmail.com>
 * @license MIT http://opensource.org/licenses/MIT
 */

namespace FFQP\Row\Cell;

use \FFQP\Row\Data\RowData;

/**
 * Normalizes the "assists" value
 */
class AssistsNormalizer implements CellNormalizerInterface
{
    /**
     * @inheritdoc
     * @see CellNormalizerInterface::normalize()
     */
    public function normalize($value, RowData $rowData, $format = null): int
    {
        return (int)$value;
    }
}
