<?php

/**
 * @author Andrea Stronati <stronati.a@gmail.com>
 * @license MIT http://opensource.org/licenses/MIT
 */

namespace FFQP\Row;

use \FFQP\Row\Data\RowData;
use \FFQP\Row\Data\PlayerData;

/**
 * Describes the interface of a row normalizer
 */
interface RowDataNormalizerInterface
{

    /**
     * Normalizes an entire row that includes different cells.
     * @param RowData $rowData
     * @param string $format
     * @return PlayerData
     */
    public function normalize(RowData $rowData, string $format): PlayerData;
}
