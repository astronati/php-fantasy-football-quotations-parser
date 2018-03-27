<?php

namespace FFQP\Map\Row;

/**
 * Normalizes the "secondaryRole" value
 */
class SecondaryRoleNormalizer implements RowFieldNormalizerInterface
{
    /**
     * @inheritdoc
     * @see RowFieldNormalizerInterface::normalize()
     */
    public function normalize($value, Row $row, $format): string
    {
        if (empty(trim($value))) {
            return $row->role;
        }

        return $value;
    }
}
