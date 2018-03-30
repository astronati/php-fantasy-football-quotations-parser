<?php

namespace FFQP\Map\Row\Normalizer\Field;

use FFQP\Map\Row\Row;
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
    public function normalize($value, Row $row, string $format, array $extra = []): int
    {
        $malus = 0;
        $bonus = (float) $value;

        if ($bonus == 0) {
            return 0;
        }

        if ($bonus < 0) {
            $malus = $bonus;
        }

        // Malus for goalkeepers per each gol is -1
        if ($malus < 0 && $row->role == $row::GOALKEEPER) {
            return abs($malus);
        }

        if ($format == QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2017) {
            switch ($row->role) {
                // To know the number of goals scored by goalkeeper, it needs to be extracted from the MagicPoints
                // TODO case $row::GOALKEEPER:
                case $row::DEFENDER:
                    return (int) ($bonus / self::FORMAT_2017_DEFENDER_GOAL_BONUS);
                case $row::MIDFIELDER:
                    return (int) ($bonus / self::FORMAT_2017_MIDFIELDER_GOAL_BONUS);
                case $row::PLAYMAKER:
                    return (int) ($bonus / self::FORMAT_2017_PLAYMAKER_GOAL_BONUS);
                case $row::FORWARD:
                    return (int) ($bonus / self::FORMAT_2017_FORWARD_GOAL_BONUS);
            }
        }

        return (int) ($bonus / self::STANDARD_GOAL_BONUS);
    }
}
