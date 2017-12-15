<?php

namespace FFQP\Map\Row;

/**
 * Normalizes the "active" value
 */
class ActiveNormalizer implements RowFieldNormalizerInterface
{
    /**
     * @inheritdoc
     * @see RowFieldNormalizerInterface::normalize()
     */
    public function normalize($value, Row $row, $format): bool
    {
        return ((int) $value) === 1 || $value === 'SI';
    }
}
