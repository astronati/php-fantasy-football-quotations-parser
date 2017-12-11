<?php

namespace FFQP\Map\Row;

/**
 * Normalizes the "team" value
 */
class TeamNormalizer implements RowFieldNormalizerInterface
{
    /**
     * @inheritdoc
     * @see RowFieldNormalizerInterface::normalize()
     */
    public function normalize($value, Row $row, $format): string
    {
        return $value;
    }
}
