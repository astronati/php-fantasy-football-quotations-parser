<?php

namespace FFQP\Map\Row;

/**
 * Normalizes the "code" value
 */
class CodeNormalizer implements RowFieldNormalizerInterface
{
    /**
     * @inheritdoc
     * @see RowFieldNormalizerInterface::normalize()
     */
    public function normalize($value, Row $row, $format): string
    {
        return (string)$value;
    }
}
