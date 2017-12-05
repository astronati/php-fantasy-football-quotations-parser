<?php

/**
 * @author Andrea Stronati <stronati.a@gmail.com>
 * @license MIT http://opensource.org/licenses/MIT
 */

namespace FFQP\Reader;

/**
 * Allows to do read operations in a spreadsheet
 */
class SpreadsheetReader implements SpreadsheetReaderInterface
{
    private $_reader;

    /**
     * @param \PHPExcelReader\SpreadsheetReader $reader
     */
    public function __construct(\PHPExcelReader\SpreadsheetReader $reader)
    {
        $this->_reader = $reader;
    }

    /**
     * @inheritdoc
     */
    public function getRowCount(): int
    {
        return $this->_reader->rowcount();
    }

    /**
     * @inheritdoc
     */
    public function read(int $row, int $col): string
    {
        return $this->_reader->val($row, $col);
    }
}
