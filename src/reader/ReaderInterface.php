<?php

/**
 * @author Andrea Stronati <stronati.a@gmail.com>
 * @license MIT http://opensource.org/licenses/MIT
 */

namespace FFQP\Reader {

  /**
   * A spreadsheet reader must implement this interface in order to get value from an excel document cells
   */
  interface ReaderInterface {

    /**
     * Returns the value of the cell at position $row,$col.
     * NOTE first cell has indexes 1,1.
     * @return integer
     */
    public function read($row, $col);

    /**
     * Returns the number of rows of the document.
     * @return integer
     */
    public function getRowCount();
  }

}
