<?php

/**
 * @author Andrea Stronati <stronati.a@gmail.com>
 * @license MIT http://opensource.org/licenses/MIT
 */

namespace FFQP\Row\Cell;

use \FFQP\Row\Map\RowMapAbstract as RowMapAbstract;
use \FFQP\Row\Cell\CellNormalizerInterface as CellNormalizerInterface;
use \FFQP\Row\Cell\ActiveNormalizer as ActiveNormalizer;
use \FFQP\Row\Cell\AssistsNormalizer as AssistsNormalizer;
use \FFQP\Row\Cell\AutoGoalsNormalizer as AutoGoalsNormalizer;
use \FFQP\Row\Cell\CodeNormalizer as CodeNormalizer;
use \FFQP\Row\Cell\GoalsNormalizer as GoalsNormalizer;
use \FFQP\Row\Cell\MagicPointsNormalizer as MagicPointsNormalizer;
use \FFQP\Row\Cell\PenaltiesNormalizer as PenaltiesNormalizer;
use \FFQP\Row\Cell\PlayerNormalizer as PlayerNormalizer;
use \FFQP\Row\Cell\QuotationNormalizer as QuotationNormalizer;
use \FFQP\Row\Cell\RedCardsNormalizer as RedCardsNormalizer;
use \FFQP\Row\Cell\RoleNormalizer as RoleNormalizer;
use \FFQP\Row\Cell\SecondaryRoleNormalizer as SecondaryRoleNormalizer;
use \FFQP\Row\Cell\TeamNormalizer as TeamNormalizer;
use \FFQP\Row\Cell\VoteNormalizer as VoteNormalizer;
use \FFQP\Row\Cell\YellowCardsNormalizer as YellowCardsNormalizer;

/**
 * @codeCoverageIgnore
 */
class CellNormalizerFactory
{
    /**
     * Returns an extension of CellNormalizerInterface
     * @param string $field
     * @return CellNormalizerInterface
     */
    public function create($field): CellNormalizerInterface
    {
        switch ($field) {
            case RowMapAbstract::ACTIVE:
                return new ActiveNormalizer();
            case RowMapAbstract::ASSISTS:
                return new AssistsNormalizer();
            case RowMapAbstract::AUTOGOALS:
                return new AutoGoalsNormalizer();
            case RowMapAbstract::CODE:
                return new CodeNormalizer();
            case RowMapAbstract::GOALS:
                return new GoalsNormalizer();
            case RowMapAbstract::MAGIC_POINTS:
                return new MagicPointsNormalizer();
            case RowMapAbstract::PENALTIES:
                return new PenaltiesNormalizer();
            case RowMapAbstract::PLAYER:
                return new PlayerNormalizer();
            case RowMapAbstract::QUOTATION:
                return new QuotationNormalizer();
            case RowMapAbstract::RED_CARDS:
                return new RedCardsNormalizer();
            case RowMapAbstract::ROLE:
                return new RoleNormalizer();
            case RowMapAbstract::SECONDARY_ROLE:
                return new SecondaryRoleNormalizer();
            case RowMapAbstract::TEAM:
                return new TeamNormalizer();
            case RowMapAbstract::VOTE:
                return new VoteNormalizer();
            case RowMapAbstract::YELLOW_CARDS:
                return new YellowCardsNormalizer();
        }
    }
}
