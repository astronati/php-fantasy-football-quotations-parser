<?php

namespace FFQP\Map\Row\Normalizer\Field\Type;

use FFQP\Map\Row\Normalizer\Field\NormalizedFieldsContainer;
use FFQP\Map\Row\Normalizer\Field\RowFieldNormalizerInterface;
use FFQP\Map\Row\Row;
use FFQP\Model\Quotation;

/**
 * Normalizes the "penalties" value
 */
class PenaltiesNormalizer implements RowFieldNormalizerInterface
{
    /**
     * @inheritdoc
     * @see RowFieldNormalizerInterface::normalize()
     */
    public function normalize($value, Row $row, string $format, NormalizedFieldsContainer $normalizedFieldsContainer = null): int
    {
        return (int) (abs($normalizedFieldsContainer->get(Quotation::PENALTIES_MAGIC_POINTS)) / 3);
    }
}
