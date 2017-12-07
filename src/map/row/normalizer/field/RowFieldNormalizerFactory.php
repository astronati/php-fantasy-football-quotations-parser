<?php

namespace FFQP\Map\Row;

use FFQP\Map\MapAbstract;

/**
 * Factory for RowFieldNormalizerInterface. Generates a specific normalizer per each field.
 */
class RowFieldNormalizerFactory
{
    /**
     * Returns an implementation of RowFieldNormalizerInterface
     * @param string $field
     * @return RowFieldNormalizerInterface
     * @throws \Exception
     */
    public static function create($field): RowFieldNormalizerInterface
    {
        switch ($field) {
            case MapAbstract::ACTIVE:
                return new ActiveNormalizer();
            case MapAbstract::ASSISTS:
                return new AssistsNormalizer();
            case MapAbstract::AUTO_GOALS:
                return new AutoGoalsNormalizer();
            case MapAbstract::CODE:
                return new CodeNormalizer();
            case MapAbstract::GOALS:
                return new GoalsNormalizer();
            case MapAbstract::MAGIC_POINTS:
                return new MagicPointsNormalizer();
            case MapAbstract::PENALTIES:
                return new PenaltiesNormalizer();
            case MapAbstract::PLAYER:
                return new PlayerNormalizer();
            case MapAbstract::QUOTATION:
                return new QuotationNormalizer();
            case MapAbstract::RED_CARDS:
                return new RedCardsNormalizer();
            case MapAbstract::ROLE:
                return new RoleNormalizer();
            case MapAbstract::SECONDARY_ROLE:
                return new SecondaryRoleNormalizer();
            case MapAbstract::TEAM:
                return new TeamNormalizer();
            case MapAbstract::VOTE:
                return new VoteNormalizer();
            case MapAbstract::YELLOW_CARDS:
                return new YellowCardsNormalizer();
            default:
                throw new \Exception('Field not found: ' . $field);
        }
    }
}
