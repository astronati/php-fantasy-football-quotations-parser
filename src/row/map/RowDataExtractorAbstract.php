<?php

/**
 * @author Andrea Stronati <stronati.a@gmail.com>
 * @license MIT http://opensource.org/licenses/MIT
 */

namespace FFQP\Row\Map;

use FFQP\Reader\SpreadsheetReader;
use FFQP\Row\Data\RowData;
use PHPExcelReader\SpreadsheetReader as PHPExcelReaderSpreadsheetReader;

/**
 * Base class for RowDataExtractor
 */
abstract class RowDataExtractorAbstract
{
    const CODE = 'code';
    const PLAYER = 'player';
    const TEAM = 'team';
    const ROLE = 'role';
    const SECONDARY_ROLE = 'secondaryRole';
    const ACTIVE = 'active';
    const QUOTATION = 'quotation';
    const MAGIC_POINTS = 'magicPoints';
    const VOTE = 'vote';
    const GOALS = 'goals';
    const YELLOW_CARDS = 'yellowCards';
    const RED_CARDS = 'redCards';
    const PENALTIES = 'penalties';
    const AUTOGOALS = 'autoGoals';
    const ASSISTS = 'assists';

    /**
     * Returns an array where the key is one of const above and the value is an integer representing the column where
     * the value is positioned in the spreadsheet.
     */
    abstract protected function getColumnIndexByFieldNameMap(): array;

    /**
     * Returns an array of parsed RowData[]
     * @param string $filePath
     * @return RowData[]
     * @throws \Exception
     */
    public function getRowData(string $filePath): array
    {
        $reader = new SpreadsheetReader(new PHPExcelReaderSpreadsheetReader($filePath));
        $allRowData = [];
        for ($row = $this->getStartingRow(); $row <= $reader->getRowCount(); $row++) {
            $rowData = new RowData(
                $reader->read($row, $this->getColumnIndexForField(self::CODE)),
                $reader->read($row, $this->getColumnIndexForField(self::PLAYER)),
                $reader->read($row, $this->getColumnIndexForField(self::TEAM)),
                $reader->read($row, $this->getColumnIndexForField(self::ROLE)),
                $reader->read($row, $this->getColumnIndexForField(self::SECONDARY_ROLE)),
                $reader->read($row, $this->getColumnIndexForField(self::ACTIVE)),
                $reader->read($row, $this->getColumnIndexForField(self::QUOTATION)),
                $reader->read($row, $this->getColumnIndexForField(self::MAGIC_POINTS)),
                $reader->read($row, $this->getColumnIndexForField(self::VOTE)),
                $reader->read($row, $this->getColumnIndexForField(self::GOALS)),
                $reader->read($row, $this->getColumnIndexForField(self::YELLOW_CARDS)),
                $reader->read($row, $this->getColumnIndexForField(self::RED_CARDS)),
                $reader->read($row, $this->getColumnIndexForField(self::PENALTIES)),
                $reader->read($row, $this->getColumnIndexForField(self::AUTOGOALS)),
                $reader->read($row, $this->getColumnIndexForField(self::ASSISTS))
            );
            $allRowData[] = $rowData;
        }

        return $allRowData;
    }

    /**
     * Given a field name (one of the constants above) returns the an integer representing the column index where
     * such field is contained in the parsed spreadsheet
     * @param $fieldName
     * @return int
     * @throws \Exception
     */
    private function getColumnIndexForField($fieldName): int
    {
        if (!isset($this->getColumnIndexByFieldNameMap()[$fieldName])) {
            throw new \Exception('Undefined index for field: ' . $fieldName);
        }

        return $this->getColumnIndexByFieldNameMap()[$fieldName];
    }

    /**
     * Returns the spreadsheet row number for which the extractor should start extracting RawData
     */
    protected function getStartingRow(): int
    {
        return 1;
    }
}
