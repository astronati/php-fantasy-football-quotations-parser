<?php

namespace FFQP\Map\Row;

/**
 * Normalizes the "redCards" value
 */
class RedCardsNormalizer implements RowFieldNormalizerInterface
{
    /**
     * @inheritdoc
     * @see RowFieldNormalizerInterface::normalize()
     */
    public function normalize($value, Row $row, $format): int
    {
        return (int)abs((float)$value);
    }
}
