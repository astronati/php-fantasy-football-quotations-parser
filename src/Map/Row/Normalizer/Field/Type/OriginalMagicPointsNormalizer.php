<?php

namespace FFQP\Map\Row\Normalizer\Field\Type;

use FFQP\Map\Gazzetta\GazzettaMapSince2017;
use FFQP\Map\Gazzetta\GazzettaMapSince2019;
use FFQP\Map\Row\Normalizer\Field\NormalizedFieldsContainer;
use FFQP\Map\Row\Normalizer\Field\RowFieldNormalizerInterface;
use FFQP\Map\Row\Row;
use FFQP\Model\Quotation;

/**
 * Normalizes the "originalMagicGoals" value
 */
class OriginalMagicPointsNormalizer implements RowFieldNormalizerInterface
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
        $magicPoints = $normalizedFieldsContainer->get(Quotation::MAGIC_POINTS)->normalize($row->magicPoints, $row, $version, $normalizedFieldsContainer);

        if ($magicPoints === null) {
            return null;
        }

        $goals = $normalizedFieldsContainer->get(Quotation::GOALS)->normalize($row->goals, $row, $version, $normalizedFieldsContainer);
        $vote = $normalizedFieldsContainer->get(Quotation::VOTE)->normalize($row->vote, $row, $version, $normalizedFieldsContainer);

        if ($row->role == Row::GOALKEEPER
                && $version >= GazzettaMapSince2019::getVersion()
                && $goals == 0
                && $vote != null) {
            // Remove bonus for having 0 goals conceded

            return $magicPoints - 1;
        }

        if ($version >= GazzettaMapSince2017::getVersion()) {
            // Remove goal difference
            $magicPoints += $this->getGoalsMagicPointsDifference($goals, $row->role, $version);
        }

        return $magicPoints;
    }

    /**
     * @param int $goals
     * @param string $role
     * @param int $version
     * @return float
     */
    private function getGoalsMagicPointsDifference(int $goals, string $role, int $version): float
    {
        if ($role == Row::GOALKEEPER) {
            return 0;
        }
        return $goals * (GoalsNormalizer::STANDARD_GOAL_BONUS - GoalsNormalizer::getBonusByRole($role, $version));
    }
}
