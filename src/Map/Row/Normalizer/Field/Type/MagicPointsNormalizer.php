<?php

namespace FFQP\Map\Row\Normalizer\Field\Type;

use FFQP\Map\Gazzetta\GazzettaMapSinceWorldCup2018;
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
    public function normalize(
      $value,
      Row $row,
      int $version,
      NormalizedFieldsContainer $normalizedFieldsContainer
    ): ?float
    {
        $magicPoints = (float) $value;
        $vote = $normalizedFieldsContainer->get(Quotation::VOTE)->normalize($row->vote, $row, $version, $normalizedFieldsContainer);

        if ($magicPoints == 0 && $vote === null) {
            return null;
        }

        $active = $normalizedFieldsContainer->get(Quotation::ACTIVE)->normalize($row->status, $row, $version, $normalizedFieldsContainer);
        // This problem was reproduced only with the 3 turn of the Fifa World Cup 2018
        if ($version === GazzettaMapSinceWorldCup2018::getVersion()
                && $magicPoints == 0
                && $vote !== null
                && !$active) {
            return $vote +
              $normalizedFieldsContainer->get(Quotation::ASSISTS_MAGIC_POINTS)->normalize($row->assists, $row, $version, $normalizedFieldsContainer) +
              $normalizedFieldsContainer->get(Quotation::AUTO_GOALS_MAGIC_POINTS)->normalize($row->autoGoals, $row, $version, $normalizedFieldsContainer) +
              $normalizedFieldsContainer->get(Quotation::GOALS_MAGIC_POINTS)->normalize($row->goals, $row, $version, $normalizedFieldsContainer) +
              $normalizedFieldsContainer->get(Quotation::PENALTIES_MAGIC_POINTS)->normalize($row->penalties, $row, $version, $normalizedFieldsContainer) +
              $normalizedFieldsContainer->get(Quotation::RED_CARDS_MAGIC_POINTS)->normalize($row->redCards, $row, $version, $normalizedFieldsContainer) +
              $normalizedFieldsContainer->get(Quotation::YELLOW_CARDS_MAGIC_POINTS)->normalize($row->yellowCards, $row, $version, $normalizedFieldsContainer);
        }

        return $magicPoints;
    }
}
