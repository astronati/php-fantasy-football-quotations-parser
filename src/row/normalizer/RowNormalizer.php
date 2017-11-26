<?php

/**
 * @author Andrea Stronati <stronati.a@gmail.com>
 * @license MIT http://opensource.org/licenses/MIT
 */

namespace FFQP\Row;

use \FFQP\Row\Cell\CellNormalizerFactory as CellNormalizerFactory;
use \FFQP\Row\Data\RawData as RawData;
use \FFQP\Row\Data\Data as Data;
use \FFQP\Row\Data\DataFactory as DataFactory;
use \FFQP\Row\Map\RowMapAbstract as RowMapAbstract;

/**
 * Allows to normalize each cell of a single row.
 */
class RowNormalizer implements RowNormalizerInterface
{
  /**
   * @type CellNormalizerFactory
   */
  private $_dataFactory;

  /**
   * @type CellNormalizerFactory
   */
  private $_cellNormalizerFactory;

  public function __construct(DataFactory $dataFactory, CellNormalizerFactory $cellNormalizerFactory)
  {
    $this->_dataFactory = $dataFactory;
    $this->_cellNormalizerFactory = $cellNormalizerFactory;
  }

  /**
   * @inheritdoc
   * @see RowNormalizerInterface::normalize()
   */
  public function normalize(RawData $rawData, RowMapAbstract $rowMap): Data
  {
    $data = $this->_dataFactory->create();

    foreach ($rowMap->getFields() as $field) {
      $data->$field = $this->_cellNormalizerFactory->create($field)->normalize(
        $rawData->$field,
        $rawData,
        $rowMap->season
      );
    }

    return $data;
  }
}
