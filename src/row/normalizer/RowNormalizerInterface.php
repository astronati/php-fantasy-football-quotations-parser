<?php

/**
 * @author Andrea Stronati <stronati.a@gmail.com>
 * @license MIT http://opensource.org/licenses/MIT
 */

namespace FFQP\Row {

  use \FFQP\Row\Data\RawData as RawData;
  use \FFQP\Row\Data\Data as Data;
  use \FFQP\Row\Map\RowMapAbstract as RowMapAbstract;

  /**
   * Describes the interface of a row normalizer
   */
  interface RowNormalizerInterface {

    /**
     * Normalizes an entire row that includes different cells.
     * @param RawData $rawData
     * @param RowMapAbstract $rowMap
     * @return Data
     */
    public function normalize(RawData $rawData, RowMapAbstract $rowMap): Data;
  }

}
