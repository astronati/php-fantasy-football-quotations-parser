<?php

namespace FFQP\Map\Row\Normalizer\Field\Type;

use FFQP\Map\Row\Normalizer\Field\NormalizedFieldsContainer;
use FFQP\Map\Row\Normalizer\Field\RowFieldNormalizerInterface;
use FFQP\Map\Row\Row;
use FFQP\Model\Quotation;
use FFQP\Parser\QuotationsParserFactory;

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
      string $format,
      NormalizedFieldsContainer $normalizedFieldsContainer
    ): int
    {
        if ($format === QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_WORLD_CUP_2018) {
            return (int) $value;
        }

        $yellowCardsMagicPoints = $normalizedFieldsContainer->get(Quotation::YELLOW_CARDS_MAGIC_POINTS)->normalize($value, $row, $format, $normalizedFieldsContainer);
        return (int) abs($yellowCardsMagicPoints / self::MALUS);
    }
}
