<?php

namespace FFQP\Map\Row\Normalizer\Field\Type;

use FFQP\Map\Row\Normalizer\Field\NormalizedFieldsContainer;
use FFQP\Map\Row\Normalizer\Field\RowFieldNormalizerInterface;
use FFQP\Map\Row\Row;
use FFQP\Model\Quotation;
use FFQP\Parser\QuotationsParserFactory;

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
      string $format,
      NormalizedFieldsContainer $normalizedFieldsContainer
    ): ?float
    {
        $magicPoints = $normalizedFieldsContainer->get(Quotation::MAGIC_POINTS)->normalize($row->magicPoints, $row, $format, $normalizedFieldsContainer);

        if ($magicPoints === null) {
            return null;
        }

        if ($format == QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_WORLD_CUP_2018
                || $format == QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2017) {
            // Remove goal difference
            $goals = $normalizedFieldsContainer->get(Quotation::GOALS)->normalize($row->goals, $row, $format, $normalizedFieldsContainer);
            $magicPoints += $this->getGoalsMagicPointsDifference($goals, $row->role);
        }

        return $magicPoints;
    }

    /**
     * @param int $goals
     * @param string $role
     * @return float
     */
    private function getGoalsMagicPointsDifference(int $goals, string $role): float
    {
        if ($role == Row::GOALKEEPER) {
            return 0;
        }
        return $goals * (GoalsNormalizer::STANDARD_GOAL_BONUS - GoalsNormalizer::getBonusByRole($role));
    }
}
