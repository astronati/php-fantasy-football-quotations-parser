<?php

/**
 * @author Andrea Stronati <stronati.a@gmail.com>
 * @license MIT http://opensource.org/licenses/MIT
 */

namespace FFQP\Row\Cell;

use \FFQP\Row\Data\RowData;

/**
 * Allows to normalize values of a cell.
 */
interface CellNormalizerInterface
{
    /**
     * Returns the normalized value of a given field of a cell.
     * @param * $value
     * @param RowData $rowData
     * @param ?string $format
     * @return int|string|bool|float|null
     */
    public function normalize($value, RowData $rowData, $format = null);
}
