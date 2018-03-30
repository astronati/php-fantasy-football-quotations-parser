<?php

namespace FFQP\Map\Row\Normalizer\Field;

use FFQP\Map\Row\Row;

/**
 * Normalizes the "penalties" value
 */
class PenaltiesNormalizer implements RowFieldNormalizerInterface
{
    /**
     * @inheritdoc
     * @see RowFieldNormalizerInterface::normalize()
     */
    public function normalize($value, Row $row, string $format, array $extra = []): int
    {
        return (int) (abs($value) / 3);
    }
}
