<?php

namespace FFQP\Map\Row;

/**
 * Normalizes the "autoGoals" value
 */
class AutoGoalsNormalizer implements RowFieldNormalizerInterface
{
    /**
     * @inheritdoc
     * @see RowFieldNormalizerInterface::normalize()
     */
    public function normalize($value, Row $row, $format): int
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
