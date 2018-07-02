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
class YellowCardsMagicPointsNormalizer implements RowFieldNormalizerInterface
{
    /**
     * @inheritdoc
     * @see RowFieldNormalizerInterface::normalize()
     */
    public function normalize($value, Row $row, string $format, NormalizedFieldsContainer $normalizedFieldsContainer = null): float
    {
        if ($format === QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_WORLD_CUP_2018) {
            $yellowCards = $normalizedFieldsContainer->get(Quotation::YELLOW_CARDS)->normalize($value, $row, $format, $normalizedFieldsContainer);
            return $yellowCards * YellowCardsNormalizer::MALUS;
        }
        return (float) $value;
    }
}
