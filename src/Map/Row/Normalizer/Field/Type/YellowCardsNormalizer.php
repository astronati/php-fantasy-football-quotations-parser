<?php

namespace FFQP\Map\Row\Normalizer\Field\Type;

use FFQP\Map\Gazzetta\GazzettaMapSinceWorldCup2018;
use FFQP\Map\Row\Normalizer\Field\NormalizedFieldsContainer;
use FFQP\Map\Row\Normalizer\Field\RowFieldNormalizerInterface;
use FFQP\Map\Row\Row;
use FFQP\Model\Quotation;

/**
 * Normalizes the "yellowCards" value
 */
class YellowCardsNormalizer implements RowFieldNormalizerInterface
{
    const MALUS = -0.5;

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

        $yellowCardsMagicPoints = $normalizedFieldsContainer->get(Quotation::YELLOW_CARDS_MAGIC_POINTS)->normalize($value, $row, $version, $normalizedFieldsContainer);
        return (int) abs($yellowCardsMagicPoints / self::MALUS);
    }
}
