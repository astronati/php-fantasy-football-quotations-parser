<?php

namespace FFQP\Map\Row\Normalizer\Field\Type;

use FFQP\Map\Row\Normalizer\Field\NormalizedFieldsContainer;
use FFQP\Map\Row\Normalizer\Field\RowFieldNormalizerInterface;
use FFQP\Map\Row\Row;
use FFQP\Model\Quotation;

/**
 * Normalizes the "magicGoals" value
 */
class MagicPointsNormalizer implements RowFieldNormalizerInterface
{
    /**
     * @inheritdoc
     * @see RowFieldNormalizerInterface::normalize()
     */
    public function normalize($value, Row $row, string $format, NormalizedFieldsContainer $normalizedFieldsContainer = null): ?float
    {
        // TODO Keep into account world cup 2018
        $bonus = (float) $value;

        $vote = $normalizedFieldsContainer->get(Quotation::VOTE)->normalize($row->vote, $row, $format, $normalizedFieldsContainer);
        if ($bonus == 0 && $vote === null) {
            return null;
        }

        return $bonus;
    }
}
