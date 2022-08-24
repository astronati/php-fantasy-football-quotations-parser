<?php

namespace FFQP\Map\Row\Normalizer\Field\Type;

use FFQP\Map\Gazzetta\GazzettaMapSince2017;
use FFQP\Map\Gazzetta\GazzettaMapSince2022;
use FFQP\Map\Gazzetta\GazzettaMapSinceWorldCup2018;
use FFQP\Map\Row\Normalizer\Field\NormalizedFieldsContainer;
use FFQP\Map\Row\Normalizer\Field\RowFieldNormalizerInterface;
use FFQP\Map\Row\Row;
use FFQP\Model\Quotation;

/**
 * Normalizes the "goals" value
 */
class GoalsNormalizer implements RowFieldNormalizerInterface
{
    const FORMAT_2017_GOALKEEPER_GOAL_BONUS = 5;
    const FORMAT_2017_DEFENDER_GOAL_BONUS = 4.5;
    const FORMAT_2017_MIDFIELDER_GOAL_BONUS = 4;
    const FORMAT_2017_PLAYMAKER_GOAL_BONUS = 3.5;
    const FORMAT_2017_FORWARD_GOAL_BONUS = 3;

    const STANDARD_GOALKEEPER_MALUS = -1;
    const STANDARD_GOAL_BONUS = 3;

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
        if ($version >= GazzettaMapSinceWorldCup2018::getVersion()
                // Malus for goalkeepers per each gol is -1
                || $row->role == $row::GOALKEEPER) {
            return abs((int) $value);
        }

        if ($version >= GazzettaMapSince2017::getVersion()) {
            $goalMagicPoints = $normalizedFieldsContainer->get(Quotation::GOALS_MAGIC_POINTS)->normalize($row->goals, $row, $version, $normalizedFieldsContainer);
            return (int) ($goalMagicPoints / self::getBonusByRole($row->role, $version));
        }

        return (int) (((float) $value) / self::STANDARD_GOAL_BONUS);
    }

    /**
     * Returns the goal bonus given the role
     * @param string $role
     * @param int $version
     * @return float
     */
    public static function getBonusByRole(string $role, int $version): float
    {
        switch ($role) {
            // To know the number of goals scored by goalkeeper, it needs to be extracted from the MagicPoints
            case Row::GOALKEEPER:
                return GoalsNormalizer::STANDARD_GOALKEEPER_MALUS;
            case Row::DEFENDER:
                if ($version < GazzettaMapSince2022::getVersion()) {
                    return GoalsNormalizer::FORMAT_2017_DEFENDER_GOAL_BONUS;
                }
                return GoalsNormalizer::STANDARD_GOAL_BONUS;
            case Row::MIDFIELDER:
                if ($version < GazzettaMapSince2022::getVersion()) {
                    return GoalsNormalizer::FORMAT_2017_MIDFIELDER_GOAL_BONUS;
                }
                return GoalsNormalizer::STANDARD_GOAL_BONUS;
            case Row::PLAYMAKER:
                if ( $version < GazzettaMapSince2022::getVersion()) {
                    return GoalsNormalizer::FORMAT_2017_PLAYMAKER_GOAL_BONUS;
                }
                return GoalsNormalizer::STANDARD_GOAL_BONUS;
            case Row::FORWARD:
            default:
                if ($version < GazzettaMapSince2022::getVersion()) {
                    return GoalsNormalizer::FORMAT_2017_FORWARD_GOAL_BONUS;
                }
                return GoalsNormalizer::STANDARD_GOAL_BONUS;
        }
    }
}
