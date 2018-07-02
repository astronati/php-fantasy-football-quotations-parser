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
class GoalsNormalizer implements RowFieldNormalizerInterface
{
    const STANDARD_GOAL_BONUS = 3;
    const FORMAT_2017_GOALKEEPER_GOAL_BONUS = 5;
    const FORMAT_2017_DEFENDER_GOAL_BONUS = 4.5;
    const FORMAT_2017_MIDFIELDER_GOAL_BONUS = 4;
    const FORMAT_2017_PLAYMAKER_GOAL_BONUS = 3.5;
    const FORMAT_2017_FORWARD_GOAL_BONUS = 3;

    /**
     * @inheritdoc
     * @see RowFieldNormalizerInterface::normalize()
     */
    public function normalize($value, Row $row, string $format, NormalizedFieldsContainer $normalizedFieldsContainer = null): int
    {
        if ($format == QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_WORLD_CUP_2018
                // Malus for goalkeepers per each gol is -1
                || $row->role == $row::GOALKEEPER) {
            return abs((int) $value);
        }

        if ($format == QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2017) {
            $goalMagicPoints = $normalizedFieldsContainer->get(Quotation::GOALS_MAGIC_POINTS)->normalize($row->magicPoints, $row, $format, $normalizedFieldsContainer);
            return (int) ($goalMagicPoints / self::getBonusByRole($row->role));
        }

        return (int) (((float) $value) / self::STANDARD_GOAL_BONUS);
    }

    /**
     * Returns the goal bonus given the role
     * @param string $role
     * @return float
     */
    public static function getBonusByRole(string $role): float
    {
        switch ($role) {
            // To know the number of goals scored by goalkeeper, it needs to be extracted from the MagicPoints
            // TODO case $row::GOALKEEPER:
            case Row::DEFENDER:
                return GoalsNormalizer::FORMAT_2017_DEFENDER_GOAL_BONUS;
            case Row::MIDFIELDER:
                return GoalsNormalizer::FORMAT_2017_MIDFIELDER_GOAL_BONUS;
            case Row::PLAYMAKER:
                return GoalsNormalizer::FORMAT_2017_PLAYMAKER_GOAL_BONUS;
            case Row::FORWARD:
            default:
                return GoalsNormalizer::FORMAT_2017_FORWARD_GOAL_BONUS;
        }
    }
}
