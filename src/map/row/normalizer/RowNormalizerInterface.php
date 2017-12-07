<?php

namespace FFQP\Map\Row;

use FFQP\Model\QuotationInterface;

/**
 * Allows to normalize an entire row.
 */
interface RowNormalizerInterface
{
    /**
     * Normalizes an entire row that includes different fields.
     * @param Row $row
     * @return QuotationInterface
     */
    public function normalize(Row $row): QuotationInterface;
}
