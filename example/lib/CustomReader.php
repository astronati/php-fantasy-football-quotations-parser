<?php

require_once __DIR__ . '/../../vendor/php-excel-reader/spreadsheet-reader/src/PHPExcelReader/SpreadsheetReader.php';
require_once __DIR__ . '/../../src/reader/ReaderInterface.php';

use \FFQP\Reader\ReaderInterface as ReaderInterface;

class CustomReader implements ReaderInterface
{
    
    private $_reader;
    
    public function __construct(\PHPExcelReader\SpreadsheetReader $reader)
    {
        $this->_reader = $reader;
    }
    
    public function getRowCount()
    {
        return $this->_reader->rowcount();
    }
    
    public function read($row, $col)
    {
        return $this->_reader->val($row, $col);
    }
}
