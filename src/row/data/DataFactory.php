<?php

/**
 * @author Andrea Stronati <stronati.a@gmail.com>
 * @license MIT http://opensource.org/licenses/MIT
 */

namespace FFQP\Row\Data;

use \FFQP\Row\Data\Data as Data;

/**
 * @codeCoverageIgnore
 */
class DataFactory
{
  /**
   * Returns an instance of Data
   * @return Data
   */
  public function create(): Data {
    return new Data();
  }
}
