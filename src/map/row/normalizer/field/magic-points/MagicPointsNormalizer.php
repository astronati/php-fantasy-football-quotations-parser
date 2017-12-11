<?php

namespace FFQP\Map\Row;

/**
 * Normalizes the "magicGoals" value
 */
class MagicPointsNormalizer implements RowFieldNormalizerInterface
{
    /**
     * @inheritdoc
     * @see RowFieldNormalizerInterface::normalize()
     */
    public function normalize($value, Row $row, $format): float
    {
        return (float)$value;
    }
}
