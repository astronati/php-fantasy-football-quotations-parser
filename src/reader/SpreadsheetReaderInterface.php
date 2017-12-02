<?php

/**
 * @author Andrea Stronati <stronati.a@gmail.com>
 * @license MIT http://opensource.org/licenses/MIT
 */

namespace FFQP\Reader;

/**
 * A spreadsheet reader must implement this interface in order to get value from an excel document cells
 */
interface SpreadsheetReaderInterface
{

    /**
     * Returns the value of the cell at position $row,$col.
     * NOTE first cell has indexes 1,1.
     * @param int $row
     * @param int $col
     * @return string
     */
    public function read(int $row, int $col): string;

    /**
     * Returns the number of rows of the document.
     * @return integer
     */
    public function getRowCount(): int;
}
