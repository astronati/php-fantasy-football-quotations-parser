<?php

namespace FFQP\Map\Row\Normalizer\Field\Type;

use FFQP\Map\Gazzetta\GazzettaMapSinceWorldCup2018;
use FFQP\Map\Row\Normalizer\Field\NormalizedFieldsContainer;
use FFQP\Map\Row\Normalizer\Field\RowFieldNormalizerInterface;
use FFQP\Map\Row\Row;
use FFQP\Model\Quotation;

/**
 * Normalizes the "autoGoals" value
 */
class AutoGoalsMagicPointsNormalizer implements RowFieldNormalizerInterface
{
    /**
     * @inheritdoc
     * @see RowFieldNormalizerInterface::normalize()
     */
    public function normalize(
      $value,
      Row $row,
      int $version,
      NormalizedFieldsContainer $normalizedFieldsContainer
    ): float
    {
        if ($version >= GazzettaMapSinceWorldCup2018::getVersion()) {
            $autoGoals = $normalizedFieldsContainer->get(Quotation::AUTO_GOALS)->normalize($value, $row, $version, $normalizedFieldsContainer);
            return $autoGoals * ($row->role === Row::GOALKEEPER ? AutoGoalsNormalizer::GOALKEEPER_MALUS : AutoGoalsNormalizer::DEFAULT_MALUS);
        }

        return (float) $value;
    }
}
