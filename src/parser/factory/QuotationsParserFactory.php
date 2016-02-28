<?php

/**
 * @author Andrea Stronati <astronati@vendini.com>
 * @license MIT http://opensource.org/licenses/MIT
 * @copyright 2015 Andrea Stronati
 * @version 0.2.0
 */

use \PHPExcelReader\SpreadsheetReader as Reader;

/**
 * Defines a Factory pattern to implement a specific quotations parser.
 */
class QuotationsParserFactory implements QuotationsParserFactoryInterface {

  /**
   * Used as flag to choose to implement a Gazzetta Parser
   * @type integer
   */
  const GAZZETTA_DELLO_SPORT = 1;

  /**
   * @inheritdoc
   */
  public static function create($filePath, $type = self::GAZZETTA_DELLO_SPORT) {
    if (!file_exists($filePath)) {
      throw new Exception('File does not exist');
    }

    switch ($type) {
      case self::GAZZETTA_DELLO_SPORT:
        return new GazzettaQuotationsParser(
          new Reader($filePath),
          new GazzettaQuotationsNormalizer()
        );
        break;
      default:
        throw new Exception('The specific parser does not exist');
    }
  }
}
