<?php

namespace FFQP\Map\Row\Normalizer\Field\Type;

use FFQP\Map\Row\Normalizer\Field\NormalizedFieldsContainer;
use FFQP\Map\Row\Normalizer\Field\RowFieldNormalizerInterface;
use FFQP\Map\Row\Row;
use FFQP\Model\Quotation;
use FFQP\Parser\QuotationsParserFactory;

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
    public function normalize($value, Row $row, string $format, NormalizedFieldsContainer $normalizedFieldsContainer = null): int
    {
        if ($format === QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_WORLD_CUP_2018) {
            return (int) $value;
        }

        return abs($normalizedFieldsContainer->get(Quotation::RED_CARDS_MAGIC_POINTS));
    }
}
