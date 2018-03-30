<?php

namespace FFQP\Map\Row\Normalizer\Field;

use FFQP\Map\Row\Row;

/**
 * Normalizes the "autoGoals" value
 */
class AutoGoalsNormalizer implements RowFieldNormalizerInterface
{
    /**
     * @inheritdoc
     * @see RowFieldNormalizerInterface::normalize()
     */
    public function normalize($value, Row $row, string $format, array $extra = []): int
    {
        $malus = abs((int) $value);

        // Malus for goalkeeper is -1
        if ($row->role == 'P') {
            return $malus;
        }

        // Default malus is -2
        return $malus / 2;
    }
}
