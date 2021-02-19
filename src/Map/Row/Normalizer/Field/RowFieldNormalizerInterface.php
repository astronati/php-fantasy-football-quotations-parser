<?php

namespace FFQP\Map\Row\Normalizer\Field;

use FFQP\Map\Row\Row;

/**
 * Allows to normalize values of a specific field.
 */
interface RowFieldNormalizerInterface
{
    /**
     * Returns the normalized value of a given field of a row.
     * @param mixed $value
     * @param Row $row
     * @param int $version
     * @param NormalizedFieldsContainer $normalizedFieldsContainer
     * @return int|string|bool|float|null
     */
    public function normalize($value, Row $row, int $version, NormalizedFieldsContainer $normalizedFieldsContainer);
}
