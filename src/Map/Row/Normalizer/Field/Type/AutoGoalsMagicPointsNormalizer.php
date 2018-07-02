<?php

namespace FFQP\Map\Row\Normalizer\Field\Type;

use FFQP\Map\Row\Normalizer\Field\NormalizedFieldsContainer;
use FFQP\Map\Row\Normalizer\Field\RowFieldNormalizerInterface;
use FFQP\Map\Row\Row;
use FFQP\Model\Quotation;
use FFQP\Parser\QuotationsParserFactory;

/**
 * Normalizes the "autoGoals" value
 */
class AutoGoalsMagicPointsNormalizer implements RowFieldNormalizerInterface
{
    /**
     * @inheritdoc
     * @see RowFieldNormalizerInterface::normalize()
     */
    public function normalize($value, Row $row, string $format, NormalizedFieldsContainer $normalizedFieldsContainer = null): float
    {
        if ($format == QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_WORLD_CUP_2018) {
            $autoGoals = $normalizedFieldsContainer->get(Quotation::AUTO_GOALS)->normalize($value, $row, $format, $normalizedFieldsContainer);
            return $autoGoals * ($row->secondaryRole === Row::GOALKEEPER ? AutoGoalsNormalizer::GOALKEEPER_MALUS : AutoGoalsNormalizer::DEFAULT_MALUS);
        }

        return (float) $value;
    }
}
