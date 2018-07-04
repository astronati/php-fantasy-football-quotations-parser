<?php

namespace FFQP\Map\Row\Normalizer\Field;

use FFQP\Exception\NotFoundFieldException;
use FFQP\Map\Row\Normalizer\Field\Type\ActiveNormalizer;
use FFQP\Map\Row\Normalizer\Field\Type\AssistsMagicPointsNormalizer;
use FFQP\Map\Row\Normalizer\Field\Type\AssistsNormalizer;
use FFQP\Map\Row\Normalizer\Field\Type\AutoGoalsMagicPointsNormalizer;
use FFQP\Map\Row\Normalizer\Field\Type\AutoGoalsNormalizer;
use FFQP\Map\Row\Normalizer\Field\Type\CodeNormalizer;
use FFQP\Map\Row\Normalizer\Field\Type\GoalsMagicPointsNormalizer;
use FFQP\Map\Row\Normalizer\Field\Type\GoalsNormalizer;
use FFQP\Map\Row\Normalizer\Field\Type\MagicPointsNormalizer;
use FFQP\Map\Row\Normalizer\Field\Type\OriginalMagicPointsNormalizer;
use FFQP\Map\Row\Normalizer\Field\Type\PenaltiesMagicPointsNormalizer;
use FFQP\Map\Row\Normalizer\Field\Type\PenaltiesNormalizer;
use FFQP\Map\Row\Normalizer\Field\Type\PlayerNormalizer;
use FFQP\Map\Row\Normalizer\Field\Type\QuotationNormalizer;
use FFQP\Map\Row\Normalizer\Field\Type\RedCardsMagicPointsNormalizer;
use FFQP\Map\Row\Normalizer\Field\Type\RedCardsNormalizer;
use FFQP\Map\Row\Normalizer\Field\Type\RoleNormalizer;
use FFQP\Map\Row\Normalizer\Field\Type\SecondaryRoleNormalizer;
use FFQP\Map\Row\Normalizer\Field\Type\TeamNormalizer;
use FFQP\Map\Row\Normalizer\Field\Type\VoteNormalizer;
use FFQP\Map\Row\Normalizer\Field\Type\YellowCardsMagicPointsNormalizer;
use FFQP\Map\Row\Normalizer\Field\Type\YellowCardsNormalizer;
use FFQP\Model\Quotation;

/**
 * Factory for RowFieldNormalizerInterface. Generates a specific normalizer per each field.
 */
class RowFieldNormalizerFactory
{
    /**
     * Returns an implementation of RowFieldNormalizerInterface
     * @param string $field
     * @return RowFieldNormalizerInterface
     * @throws NotFoundFieldException
     */
    public static function create($field): RowFieldNormalizerInterface
    {
        switch ($field) {
            case Quotation::ACTIVE:
                return new ActiveNormalizer();
            case Quotation::ASSISTS_MAGIC_POINTS:
                return new AssistsMagicPointsNormalizer();
            case Quotation::ASSISTS:
                return new AssistsNormalizer();
            case Quotation::AUTO_GOALS_MAGIC_POINTS:
                return new AutoGoalsMagicPointsNormalizer();
            case Quotation::AUTO_GOALS:
                return new AutoGoalsNormalizer();
            case Quotation::CODE:
                return new CodeNormalizer();
            case Quotation::GOALS_MAGIC_POINTS:
                return new GoalsMagicPointsNormalizer();
            case Quotation::GOALS:
                return new GoalsNormalizer();
            case Quotation::MAGIC_POINTS:
                return new MagicPointsNormalizer();
            case Quotation::ORIGINAL_MAGIC_POINTS:
                return new OriginalMagicPointsNormalizer();
            case Quotation::PENALTIES_MAGIC_POINTS:
                return new PenaltiesMagicPointsNormalizer();
            case Quotation::PENALTIES:
                return new PenaltiesNormalizer();
            case Quotation::PLAYER:
                return new PlayerNormalizer();
            case Quotation::QUOTATION:
                return new QuotationNormalizer();
            case Quotation::RED_CARDS_MAGIC_POINTS:
                return new RedCardsMagicPointsNormalizer();
            case Quotation::RED_CARDS:
                return new RedCardsNormalizer();
            case Quotation::ROLE:
                return new RoleNormalizer();
            case Quotation::SECONDARY_ROLE:
                return new SecondaryRoleNormalizer();
            case Quotation::TEAM:
                return new TeamNormalizer();
            case Quotation::VOTE:
                return new VoteNormalizer();
            case Quotation::YELLOW_CARDS_MAGIC_POINTS:
                return new YellowCardsMagicPointsNormalizer();
            case Quotation::YELLOW_CARDS:
                return new YellowCardsNormalizer();
            default:
                throw new NotFoundFieldException('Field not found: ' . $field);
        }
    }
}
