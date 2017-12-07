<?php

namespace FFQP\Parser;

use FFQP\Map\MapAbstract;
use FFQP\Map\Row\RowNormalizer;

/**
 * Allows to return footballers quotations
 */
class QuotationsParser implements QuotationsParserInterface
{
    /**
     * @var MapAbstract
     */
    private $_map;

    /**
     * @var RowNormalizer
     */
    private $_normalizer;

    /**
     * @param MapAbstract $map
     * @param RowNormalizer $normalizer
     */
    public function __construct(MapAbstract $map, RowNormalizer $normalizer)
    {
        $this->_map = $map;
        $this->_normalizer = $normalizer;
    }

    /**
     * @inheritdoc
     * @see \FFQP\Model\Quotation
     */
    public function getQuotations(string $filePath): array
    {
        $quotations = [];
        foreach ($this->_map->extractRows($filePath) as $row) {
            $quotations[] = $this->_normalizer->normalize($row);
        }

        return $quotations;
    }
}
