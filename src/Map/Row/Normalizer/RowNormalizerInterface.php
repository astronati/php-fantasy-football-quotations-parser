<?php

namespace FFQP\Map\Row\Normalizer;

use FFQP\Map\Row\Row;
use FFQP\Model\Quotation;

/**
 * Allows to normalize an entire row.
 */
interface RowNormalizerInterface
{
    /**
     * Normalizes an entire row that includes different fields.
     * @param Row $row
     * @return Quotation
     */
    public function normalize(Row $row): Quotation;
}
