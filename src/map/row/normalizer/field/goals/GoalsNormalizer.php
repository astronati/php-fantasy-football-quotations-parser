<?php

namespace FFQP\Map\Row;

use FFQP\Parser\QuotationsParserFactory;

/**
 * Normalizes the "goals" value
 */
class GoalsNormalizer implements RowFieldNormalizerInterface
{
    /**
     * @inheritdoc
     * @see RowFieldNormalizerInterface::normalize()
     */
    public function normalize($value, Row $row, $format): int
    {
        $malus = 0;
        $bonus = (float)$value;

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

        if ($format == QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2015) {
            switch ($row->secondaryRole) {
                case $row::GOALKEEPER:
                    return $bonus / 5;
                case $row::DEFENDER:
                    return $bonus / 4.5;
                case $row::MIDFIELDER:
                    return $bonus / 4;
                case $row::PLAYMAKER:
                    return $bonus / 3.5;
                case $row::FORWARD:
                    return $bonus / 3;
            }
        }

        return $bonus / 3;
    }
}
