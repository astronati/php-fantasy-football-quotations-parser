<?php

namespace FFQP\Map\Row\Normalizer\Field;

use FFQP\Map\Row\Row;
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
    public function normalize($value, Row $row, string $format, array $extra = []): ?float
    {
        $magicPoints = $extra['magicPoints'];

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
            return $this->getNormalizedMagicPointsByRoleBonus($magicPoints, $extra['goals'], $goalBonus);
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
}
