<?php

namespace FFQP\Map\Row;

/**
 * Normalizes the "yellowCards" value
 */
class YellowCardsNormalizer implements RowFieldNormalizerInterface
{
    /**
     * @inheritdoc
     * @see RowFieldNormalizerInterface::normalize()
     */
    public function normalize($value, Row $row, $format): int
    {
        return (int)(abs((float)str_replace(',', '.', $value)) / 0.5);
    }
}
