<?php

namespace FFQP\Map\Row;

/**
 * Normalizes the "penalties" value
 */
class PenaltiesNormalizer implements RowFieldNormalizerInterface
{
    /**
     * @inheritdoc
     * @see RowFieldNormalizerInterface::normalize()
     */
    public function normalize($value, Row $row, $format): int
    {
        return (int)(abs(str_replace(',', '.', (float)$value)) / 3);
    }
}
