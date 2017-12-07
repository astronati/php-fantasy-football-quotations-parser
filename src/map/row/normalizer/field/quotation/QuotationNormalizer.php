<?php

namespace FFQP\Map\Row;

/**
 * Normalizes the "quotation" value
 */
class QuotationNormalizer implements RowFieldNormalizerInterface
{
    /**
     * @inheritdoc
     * @see RowFieldNormalizerInterface::normalize()
     */
    public function normalize($value, Row $row, $format): int
    {
        return (int)$value;
    }
}
