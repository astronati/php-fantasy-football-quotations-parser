<?php

namespace FFQP\Map;

use FFQP\Map\Row\Row;

/**
 * Defines basic methods and properties of any Map
 */
abstract class MapAbstract implements MapInterface
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
    const AUTO_GOALS = 'autoGoals';
    const ASSISTS = 'assists';

    /**
     * Returns an array where the key is one of const above and the value is an integer representing the column where
     * the value is positioned in the spreadsheet.
     * @return array
     */
    abstract protected function getColumnIndexByFieldNameMap(): array;

    /**
     * Given a field name (one of the constants above) returns an integer representing the column index where such field
     * is contained in the parsed spreadsheet.
     * @param $fieldName
     * @return int
     * @throws \Exception
     */
    private function getColumnIndexByField(string $fieldName): int
    {
        return $this->getColumnIndexByFieldNameMap()[$fieldName];
    }

    /**
     * Returns the spreadsheet row number for which the extractor should start extracting row data.
     * @return int
     */
    private function getStartingRow(): int
    {
        return 3;
    }

    /**
     * @inheritdoc
     * @see MapInterface::extractRows()
     * @see Row
     */
    public function extractRows(string $filePath): array
    {
        $objPHPExcel = \PHPExcel_IOFactory::load($filePath);
        $sheet = $objPHPExcel->getSheet(0);

        $rows = [];
        for ($rowNumber = $this->getStartingRow(); $rowNumber <= $sheet->getHighestRow(); $rowNumber++) {
            $rows[] = new Row(
              $sheet->getCellByColumnAndRow($this->getColumnIndexByField(self::CODE), $rowNumber),
              $sheet->getCellByColumnAndRow($this->getColumnIndexByField(self::PLAYER), $rowNumber),
              $sheet->getCellByColumnAndRow($this->getColumnIndexByField(self::TEAM), $rowNumber),
              $sheet->getCellByColumnAndRow($this->getColumnIndexByField(self::ROLE), $rowNumber),
              $sheet->getCellByColumnAndRow($this->getColumnIndexByField(self::SECONDARY_ROLE), $rowNumber),
              $sheet->getCellByColumnAndRow($this->getColumnIndexByField(self::ACTIVE), $rowNumber),
              $sheet->getCellByColumnAndRow($this->getColumnIndexByField(self::QUOTATION), $rowNumber),
              $sheet->getCellByColumnAndRow($this->getColumnIndexByField(self::MAGIC_POINTS), $rowNumber),
              $sheet->getCellByColumnAndRow($this->getColumnIndexByField(self::VOTE), $rowNumber),
              $sheet->getCellByColumnAndRow($this->getColumnIndexByField(self::GOALS), $rowNumber),
              $sheet->getCellByColumnAndRow($this->getColumnIndexByField(self::YELLOW_CARDS), $rowNumber),
              $sheet->getCellByColumnAndRow($this->getColumnIndexByField(self::RED_CARDS), $rowNumber),
              $sheet->getCellByColumnAndRow($this->getColumnIndexByField(self::PENALTIES), $rowNumber),
              $sheet->getCellByColumnAndRow($this->getColumnIndexByField(self::AUTO_GOALS), $rowNumber),
              $sheet->getCellByColumnAndRow($this->getColumnIndexByField(self::ASSISTS), $rowNumber)
            );
        }

        return $rows;
    }
}
