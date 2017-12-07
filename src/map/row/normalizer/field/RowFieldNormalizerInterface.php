<?php

namespace FFQP\Map\Row;

/**
 * Allows to normalize values of a specific field.
 */
interface RowFieldNormalizerInterface
{
    /**
     * Returns the normalized value of a given field of a row.
     * @param * $value
     * @param Row $row
     * @param string $format
     * @return int|string|bool|float|null
     */
    public function normalize($value, Row $row, $format);
}
