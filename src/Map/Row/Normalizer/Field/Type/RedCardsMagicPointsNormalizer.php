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
class RedCardsMagicPointsNormalizer implements RowFieldNormalizerInterface
{
    /**
     * @inheritdoc
     * @see RowFieldNormalizerInterface::normalize()
     */
    public function normalize($value, Row $row, string $format, NormalizedFieldsContainer $normalizedFieldsContainer = null): float
    {
        if ($format === QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_WORLD_CUP_2018) {
            $redCards = $normalizedFieldsContainer->get(Quotation::RED_CARDS)->normalize($value, $row, $format, $normalizedFieldsContainer);
            return $redCards * RedCardsNormalizer::MALUS;
        }
        return (float) $value;
    }
}
