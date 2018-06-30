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
    public function normalize($value, Row $row, string $format, NormalizedFieldsContainer $normalizedFieldsContainer = null): ?float
    {
        $magicPoints = $normalizedFieldsContainer->get(Quotation::MAGIC_POINTS);

        // (Fantamondiale) It can happen that if team left the mondiale, the footballer has a vote but not magic points,
        // so it's manually calculated.
        if ($format == QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_WORLD_CUP_2018
                && !$normalizedFieldsContainer->get(Quotation::ACTIVE)
                && $normalizedFieldsContainer->get(Quotation::VOTE) !== null) {
            return $normalizedFieldsContainer->get(Quotation::VOTE)
              + $this->getNormalizedGoalByRoleBonus(
                $normalizedFieldsContainer->get(Quotation::GOALS),
                $normalizedFieldsContainer->get(Quotation::SECONDARY_ROLE)
              )
              - ($normalizedFieldsContainer->get(Quotation::RED_CARDS) * 0.5)
              - $normalizedFieldsContainer->get(Quotation::YELLOW_CARDS)
              + $normalizedFieldsContainer->get(Quotation::ASSISTS)
              + $this->getNormalizedPenaltyByRoleBonus(
                $normalizedFieldsContainer->get(Quotation::PENALTIES),
                $normalizedFieldsContainer->get(Quotation::SECONDARY_ROLE)
              )
              + $this->getNormalizedAutogoalsByRoleBonus(
                $normalizedFieldsContainer->get(Quotation::AUTO_GOALS)
              );
        }

        if ($magicPoints === null) {
            return $magicPoints;
        }

        if ($format == QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2017) {
            switch ($row->role) {
                // TODO case $row::GOALKEEPER:
                case $row::DEFENDER:
                    $goalBonus = GoalsNormalizer::FORMAT_2017_DEFENDER_GOAL_BONUS;
                    break;
                case $row::MIDFIELDER:
                    $goalBonus = GoalsNormalizer::FORMAT_2017_MIDFIELDER_GOAL_BONUS;
                    break;
                case $row::PLAYMAKER:
                    $goalBonus = GoalsNormalizer::FORMAT_2017_PLAYMAKER_GOAL_BONUS;
                    break;
                case $row::FORWARD:
                default:
                    $goalBonus = GoalsNormalizer::FORMAT_2017_FORWARD_GOAL_BONUS;
                    break;
            }
            return $this->getNormalizedMagicPointsByRoleBonus($magicPoints, $normalizedFieldsContainer->get(Quotation::GOALS), $goalBonus);
        }

        return $magicPoints;
    }

    /**
     * @param float|null $magicPoints
     * @param int $goals
     * @param float $roleBonus
     * @return float
     */
    private function getNormalizedMagicPointsByRoleBonus(?float $magicPoints, int $goals, float $roleBonus): float
    {
        return $magicPoints + $goals * (GoalsNormalizer::STANDARD_GOAL_BONUS - $roleBonus);
    }

    // TODO
    private function getNormalizedGoalByRoleBonus(int $goals, string $role): float
    {
        if ($role === Row::GOALKEEPER) {
            return $goals * (-1);
        }
        return $goals * GoalsNormalizer::STANDARD_GOAL_BONUS;
    }

    // TODO
    private function getNormalizedPenaltyByRoleBonus(int $penalties, string $role): float
    {
        if ($role === Row::GOALKEEPER) {
            return $penalties * GoalsNormalizer::STANDARD_GOAL_BONUS;
        }
        return $penalties * GoalsNormalizer::STANDARD_GOAL_BONUS * (-1);
    }

    // TODO
    private function getNormalizedAutogoalsByRoleBonus(int $autogoals): float
    {
        return -1 * $autogoals;
    }
}
