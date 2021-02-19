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
class RedCardsMagicPointsNormalizer implements RowFieldNormalizerInterface
{
    /**
     * @inheritdoc
     * @see RowFieldNormalizerInterface::normalize()
     */
    public function normalize(
      $value,
      Row $row,
      int $version,
      NormalizedFieldsContainer $normalizedFieldsContainer
    ): float
    {
        if ($version >= GazzettaMapSinceWorldCup2018::getVersion()) {
            $redCards = $normalizedFieldsContainer->get(Quotation::RED_CARDS)->normalize($value, $row, $version, $normalizedFieldsContainer);
            return $redCards * RedCardsNormalizer::MALUS;
        }
        return (float) $value;
    }
}
