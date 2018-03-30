<?php

namespace FFQP\Parser;

use FFQP\Map\MapAbstract;
use FFQP\Map\Row\Normalizer\RowNormalizer;
use FFQP\Model\Quotation;

/**
 * Allows to return footballers quotations
 */
class QuotationsParser implements QuotationsParserInterface
{
    /**
     * @var MapAbstract
     */
    private $map;

    /**
     * @var RowNormalizer
     */
    private $normalizer;

    /**
     * @param MapAbstract $map
     * @param RowNormalizer $normalizer
     */
    public function __construct(MapAbstract $map, RowNormalizer $normalizer)
    {
        $this->map = $map;
        $this->normalizer = $normalizer;
    }

    /**
     * @inheritdoc
     * @return Quotation[]
     * @see QuotationsParserInterface::getQuotations()
     */
    public function getQuotations(string $filePath): array
    {
        $quotations = [];
        foreach ($this->map->extractRows($filePath) as $row) {
            $quotations[] = $this->normalizer->normalize($row);
        }

        return $quotations;
    }
}
