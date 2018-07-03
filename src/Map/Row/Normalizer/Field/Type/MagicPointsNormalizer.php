<?php

namespace FFQP\Map\Row\Normalizer\Field\Type;

use FFQP\Map\Row\Normalizer\Field\NormalizedFieldsContainer;
use FFQP\Map\Row\Normalizer\Field\RowFieldNormalizerInterface;
use FFQP\Map\Row\Row;
use FFQP\Model\Quotation;
use FFQP\Parser\QuotationsParserFactory;

/**
 * Normalizes the "magicGoals" value
 */
class MagicPointsNormalizer implements RowFieldNormalizerInterface
{
    /**
     * @inheritdoc
     * @see RowFieldNormalizerInterface::normalize()
     */
    public function normalize(
      $value,
      Row $row,
      string $format,
      NormalizedFieldsContainer $normalizedFieldsContainer
    ): ?float
    {
        $magicPoints = (float) $value;
        $vote = $normalizedFieldsContainer->get(Quotation::VOTE)->normalize($row->vote, $row, $format, $normalizedFieldsContainer);

        if ($magicPoints == 0 && $vote === null) {
            return null;
        }

        $active = $normalizedFieldsContainer->get(Quotation::ACTIVE)->normalize($row->status, $row, $format, $normalizedFieldsContainer);
        if ($format == QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_WORLD_CUP_2018
                && $magicPoints === 0
                && $vote !== null
                && !$active) {
            return $vote +
              $normalizedFieldsContainer->get(Quotation::ASSISTS_MAGIC_POINTS)->normalize($row->assists, $row, $format, $normalizedFieldsContainer) +
              $normalizedFieldsContainer->get(Quotation::AUTO_GOALS_MAGIC_POINTS)->normalize($row->autoGoals, $row, $format, $normalizedFieldsContainer) +
              $normalizedFieldsContainer->get(Quotation::GOALS_MAGIC_POINTS)->normalize($row->goals, $row, $format, $normalizedFieldsContainer) +
              $normalizedFieldsContainer->get(Quotation::PENALTIES_MAGIC_POINTS)->normalize($row->penalties, $row, $format, $normalizedFieldsContainer) +
              $normalizedFieldsContainer->get(Quotation::RED_CARDS_MAGIC_POINTS)->normalize($row->redCards, $row, $format, $normalizedFieldsContainer) +
              $normalizedFieldsContainer->get(Quotation::YELLOW_CARDS_MAGIC_POINTS)->normalize($row->yellowCards, $row, $format, $normalizedFieldsContainer);
        }

        return $magicPoints;
    }
}
