<?php

/**
 * @author Andrea Stronati <stronati.a@gmail.com>
 * @license MIT http://opensource.org/licenses/MIT
 */

namespace FFQP\Parser;

use \FFQP\Row\Map\RowDataExtractorAbstract;
use \FFQP\Row\RowDataNormalizer;

/**
 * Generate PlayerData objects
 */
class PlayerDataGenerator implements PlayerDataParserInterface
{
    /**
     * @var RowDataExtractorAbstract
     */
    private $_extractor;

    /**
     * @var RowDataNormalizer
     */
    private $_normalizer;

    /**
     * @var string
     */
    private $_format;

    /**
     * @param RowDataExtractorAbstract $parser
     * @param RowDataNormalizer $normalizer
     * @param string $format
     */
    public function __construct(RowDataExtractorAbstract $parser, RowDataNormalizer $normalizer, string $format)
    {
        $this->_extractor = $parser;
        $this->_normalizer = $normalizer;
        $this->_format = $format;
    }

    /**
     * @inheritdoc
     */
    public function getPlayerData(string $filePath): array
    {
        $playerData = [];
        foreach ($this->_extractor->getRowData($filePath) as $rowData) {
            $playerData[] = $this->_normalizer->normalize($rowData, $this->_format);
        }

        return $playerData;
    }
}
