<?php

namespace FFQP\Map\Row;

/**
 * Normalizes the "assists" value
 */
class AssistsNormalizer implements RowFieldNormalizerInterface
{
    /**
     * @inheritdoc
     * @see RowFieldNormalizerInterface::normalize()
     */
    public function normalize($value, Row $row, $format): int
    {
        return (int)$value;
    }
}
