<?php

namespace FFQP\Map\Row\Normalizer\Field;

use FFQP\Map\Row\Row;

/**
 * Normalizes the "yellowCards" value
 */
class YellowCardsNormalizer implements RowFieldNormalizerInterface
{
    /**
     * @inheritdoc
     * @see RowFieldNormalizerInterface::normalize()
     */
    public function normalize($value, Row $row, string $format, array $extra = []): int
    {
        return (int) (abs((float) $value) / 0.5);
    }
}
