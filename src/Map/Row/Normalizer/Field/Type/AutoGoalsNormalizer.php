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
class AutoGoalsNormalizer implements RowFieldNormalizerInterface
{
    const GOALKEEPER_MALUS = -1;
    const DEFAULT_MALUS = -2;

    /**
     * @inheritdoc
     * @see RowFieldNormalizerInterface::normalize()
     */
    public function normalize(
      $value,
      Row $row,
      int $version,
      NormalizedFieldsContainer $normalizedFieldsContainer
    ): int
    {
        if ($version >= GazzettaMapSinceWorldCup2018::getVersion()) {
            return abs((int) $value);
        }

        $malus = $normalizedFieldsContainer->get(Quotation::AUTO_GOALS_MAGIC_POINTS)->normalize($row->autoGoals, $row, $version, $normalizedFieldsContainer);
        return (int) $malus / ($row->role === Row::GOALKEEPER ? self::GOALKEEPER_MALUS : self::DEFAULT_MALUS);
    }
}
