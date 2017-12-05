<?php

/**
 * @author Andrea Stronati <stronati.a@gmail.com>
 * @license MIT http://opensource.org/licenses/MIT
 */

namespace FFQP\Row\Cell;

use \FFQP\Row\Map\RowDataExtractorAbstract;

/**
 * Factory for CellNormalizer
 */
class CellNormalizerFactory
{
    /**
     * Returns an extension of CellNormalizerInterface
     * @param string $field
     * @return CellNormalizerInterface
     * @throws \Exception
     */
    public function create($field): CellNormalizerInterface
    {
        switch ($field) {
            case RowDataExtractorAbstract::ACTIVE:
                return new ActiveNormalizer();
            case RowDataExtractorAbstract::ASSISTS:
                return new AssistsNormalizer();
            case RowDataExtractorAbstract::AUTOGOALS:
                return new AutoGoalsNormalizer();
            case RowDataExtractorAbstract::CODE:
                return new CodeNormalizer();
            case RowDataExtractorAbstract::GOALS:
                return new GoalsNormalizer();
            case RowDataExtractorAbstract::MAGIC_POINTS:
                return new MagicPointsNormalizer();
            case RowDataExtractorAbstract::PENALTIES:
                return new PenaltiesNormalizer();
            case RowDataExtractorAbstract::PLAYER:
                return new PlayerNormalizer();
            case RowDataExtractorAbstract::QUOTATION:
                return new QuotationNormalizer();
            case RowDataExtractorAbstract::RED_CARDS:
                return new RedCardsNormalizer();
            case RowDataExtractorAbstract::ROLE:
                return new RoleNormalizer();
            case RowDataExtractorAbstract::SECONDARY_ROLE:
                return new SecondaryRoleNormalizer();
            case RowDataExtractorAbstract::TEAM:
                return new TeamNormalizer();
            case RowDataExtractorAbstract::VOTE:
                return new VoteNormalizer();
            case RowDataExtractorAbstract::YELLOW_CARDS:
                return new YellowCardsNormalizer();
            default:
                throw new \Exception('Unhandled field ' . $field);
        }
    }
}
