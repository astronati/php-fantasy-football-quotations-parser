<?php

namespace FFQP\Map\Row\Normalizer\Field\Type;

use FFQP\Map\Row\Normalizer\Field\NormalizedFieldsContainer;
use FFQP\Map\Row\Normalizer\Field\RowFieldNormalizerInterface;
use FFQP\Map\Row\Row;
use FFQP\Model\Quotation;
use FFQP\Parser\QuotationsParserFactory;

/**
 * Normalizes the "goals" value
 */
class GoalsMagicPointsNormalizer implements RowFieldNormalizerInterface
{
    /**
     * @inheritdoc
     * @see RowFieldNormalizerInterface::normalize()
     */
    public function normalize(
      $value,
      Row $row,
      string $format,
      NormalizedFieldsContainer $normalizedFieldsContainer
    ): float
    {
        if (in_array($format, [
            QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2013,
            QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2015,
            QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2017,
        ])) {
            return (float) $value;
        }

        $goals = $normalizedFieldsContainer->get(Quotation::GOALS)->normalize($value, $row, $format, $normalizedFieldsContainer);
        return (float) ($goals * GoalsNormalizer::getBonusByRole($row->role));
    }
}
