<?php

namespace FFQP\Map\Row\Normalizer\Field;

use FFQP\Map\Row\Row;

/**
 * Normalizes the "magicGoals" value
 */
class MagicPointsNormalizer implements RowFieldNormalizerInterface
{
    /**
     * @inheritdoc
     * @see RowFieldNormalizerInterface::normalize()
     */
    public function normalize($value, Row $row, string $format, array $extra = []): ?float
    {
        $bonus = (float) $value;

        if ($bonus == 0 && $row->vote != 'S.V.' && ((float) $row->vote == 0)) {
            return null;
        }

        return $bonus;
    }
}
