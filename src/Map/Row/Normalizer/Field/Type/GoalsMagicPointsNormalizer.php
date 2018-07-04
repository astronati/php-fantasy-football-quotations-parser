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
        if ($format == QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_WORLD_CUP_2018) {
            $goals = $normalizedFieldsContainer->get(Quotation::GOALS)->normalize($value, $row, $format, $normalizedFieldsContainer);
            return (float) ($goals * GoalsNormalizer::getBonusByRole($row->role));
        }

        return (float) $value;
    }
}
