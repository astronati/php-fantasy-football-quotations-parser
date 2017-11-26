<?php

/**
 * @author Andrea Stronati <stronati.a@gmail.com>
 * @license MIT http://opensource.org/licenses/MIT
 */

namespace FFQP\Parser;

use \FFQP\Parser\ParserInterface as ParserInterface;
use \FFQP\Reader\ReaderInterface as ReaderInterface;
use \FFQP\Row\Data\RawDataFactory as RawDataFactory;
use \FFQP\Row\Map\RowMapAbstract as RowMapAbstract;
use \FFQP\Row\RowNormalizer as RowNormalizer;

/**
 * Allows to parse an EXCEL file provided by gazzetta.it
 */
class Parser implements ParserInterface
{
    /**
     * An instance of an EXCEL reader
     * @var ReaderInterface
     */
    private $_reader;
    
    /**
     * An instance of a row map
     * @var RowMapAbstract
     */
    private $_map;
    
    /**
     * An instance of a row normalizer
     * @var RowNormalizer
     */
    private $_normalizer;
    
    /**
     * An instance of a raw data factory
     * @var RawDataFactory
     */
    private $_rawDataFactory;
    
    /**
     * An instance of a raw data factory
     * @var \FFQP\Row\Data\RawData[]
     */
    private $_rawData = [];
    
    /**
     * @param ReaderInterface $reader An instance implementing the ReaderInterface
     * @param RowMapAbstract $map Knows where the quotation information are stored in the excel file+
     * @param RowNormalizer $normalizer
     * @param RawDataFactory $rawDataFactory
     */
    public function __construct(
      ReaderInterface $reader,
      RowMapAbstract $map,
      RowNormalizer $normalizer,
      RawDataFactory $rawDataFactory
    )
    {
        $this->_reader = $reader;
        $this->_map = $map;
        $this->_normalizer = $normalizer;
        $this->_rawDataFactory = $rawDataFactory;
        
        for ($row = 3; $row <= $this->_reader->getRowCount(); $row++) {
            $rawData = $this->_rawDataFactory->create();
            foreach ($this->_map->getFields() as $field) {
                $rawData->$field = $this->_reader->read($row, $this->_map->getOffset($field));
            }
            array_push($this->_rawData, $rawData);
        }
    }
    
    /**
     * @inheritdoc
     * @see ParserInterface::getData()
     */
    public function getData(): array
    {
        $normalizedQuotations = [];
        for ($i = 0; $i < count($this->_rawData); $i++) {
            $data = $this->_normalizer->normalize($this->_rawData[$i], $this->_map);
            array_push($normalizedQuotations, $data);
        }
        return $normalizedQuotations;
    }
    
    /**
     * @inheritdoc
     * @see ParserInterface::getRawData()
     */
    public function getRawData(): array
    {
        return $this->_rawData;
    }
}
