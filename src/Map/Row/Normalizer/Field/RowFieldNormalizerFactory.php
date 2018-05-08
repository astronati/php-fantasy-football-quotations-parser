<?php

namespace FFQP\Map\Row\Normalizer\Field;

use FFQP\Exception\NotFoundFieldException;
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
            case Quotation::ASSISTS:
                return new AssistsNormalizer();
            case Quotation::AUTO_GOALS:
                return new AutoGoalsNormalizer();
            case Quotation::CODE:
                return new CodeNormalizer();
            case Quotation::GOALS:
                return new GoalsNormalizer();
            case Quotation::MAGIC_POINTS:
                return new MagicPointsNormalizer();
            case Quotation::ORIGINAL_MAGIC_POINTS:
                return new OriginalMagicPointsNormalizer();
            case Quotation::PENALTIES:
                return new PenaltiesNormalizer();
            case Quotation::PLAYER:
                return new PlayerNormalizer();
            case Quotation::QUOTATION:
                return new QuotationNormalizer();
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
            case Quotation::YELLOW_CARDS:
                return new YellowCardsNormalizer();
            default:
                throw new NotFoundFieldException('Field not found: ' . $field);
        }
    }
}
