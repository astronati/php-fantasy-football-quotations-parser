<?php

namespace FFQP\Map\Row;

/**
 * Normalizes the "role" value
 */
class RoleNormalizer implements RowFieldNormalizerInterface
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
