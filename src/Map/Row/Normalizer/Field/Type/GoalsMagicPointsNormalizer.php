<?php

namespace FFQP\Map\Row\Normalizer\Field\Type;

use FFQP\Map\Gazzetta\GazzettaMapSinceWorldCup2018;
use FFQP\Map\Row\Normalizer\Field\NormalizedFieldsContainer;
use FFQP\Map\Row\Normalizer\Field\RowFieldNormalizerInterface;
use FFQP\Map\Row\Row;
use FFQP\Model\Quotation;

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
      int $version,
      NormalizedFieldsContainer $normalizedFieldsContainer
    ): float
    {
        if ($version >= GazzettaMapSinceWorldCup2018::getVersion()) {
            $goals = $normalizedFieldsContainer->get(Quotation::GOALS)->normalize($value, $row, $version, $normalizedFieldsContainer);
            return (float) ($goals * GoalsNormalizer::getBonusByRole($row->role));
        }

        return (float) $value;
    }
}
