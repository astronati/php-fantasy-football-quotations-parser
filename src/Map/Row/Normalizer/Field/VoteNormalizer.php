<?php

namespace FFQP\Map\Row\Normalizer\Field;

use FFQP\Map\Row\Row;

/**
 * Normalizes the "vote" value
 */
class VoteNormalizer implements RowFieldNormalizerInterface
{
    /**
     * @inheritdoc
     * @see RowFieldNormalizerInterface::normalize()
     */
    public function normalize($value, Row $row, string $format, array $extra = []): ?float
    {
        $bonus = (float) $value;
        if ($value == 'S.V.' || $bonus == 0) {
            return null;
        }
        return $bonus;
    }
}
