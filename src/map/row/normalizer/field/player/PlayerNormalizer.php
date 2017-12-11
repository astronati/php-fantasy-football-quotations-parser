<?php

namespace FFQP\Map\Row;

/**
 * Normalizes the "player" value
 */
class PlayerNormalizer implements RowFieldNormalizerInterface
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
