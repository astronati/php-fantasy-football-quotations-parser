<?php

namespace FFQP\Map\Row\Normalizer\Field;

use FFQP\Map\Row\Row;

/**
 * Normalizes the "secondaryRole" value
 */
class SecondaryRoleNormalizer implements RowFieldNormalizerInterface
{
    /**
     * @inheritdoc
     * @see RowFieldNormalizerInterface::normalize()
     */
    public function normalize($value, Row $row, string $format, array $extra = []): string
    {
        if (empty(trim($value))) {
            return $row->role;
        }

        return $value;
    }
}
