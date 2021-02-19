<?php

namespace FFQP\Map\Row\Normalizer\Field\Type;

use FFQP\Map\Gazzetta\GazzettaMapSinceWorldCup2018;
use FFQP\Map\Row\Normalizer\Field\NormalizedFieldsContainer;
use FFQP\Map\Row\Normalizer\Field\RowFieldNormalizerInterface;
use FFQP\Map\Row\Row;
use FFQP\Model\Quotation;

/**
 * Normalizes the "redCards" value
 */
class RedCardsNormalizer implements RowFieldNormalizerInterface
{
    const MALUS = -1;

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
        if ($version >= GazzettaMapSinceWorldCup2018::getVersion()) {
            return (int) $value;
        }

        $redCardsMagicPoints = $normalizedFieldsContainer->get(Quotation::RED_CARDS_MAGIC_POINTS)->normalize($value, $row, $version, $normalizedFieldsContainer);
        return abs($redCardsMagicPoints);
    }
}
