<?php

/**
 * @author Andrea Stronati <astronati@vendini.com>
 * @license MIT http://opensource.org/licenses/MIT
 * @copyright 2015 Andrea Stronati
 * @version 0.1.0
 */
require "vendor/autoload.php";

/**
 * Defines a Factory pattern to implement a specific quotations parser.
 */
class QuotationsParserFactory implements QuotationsParserFactoryInterface {

  /**
   * Used as flag to choose to implement a Gazzetta Parser
   * @type integer
   */
  const GAZZETTA = 1;

  /**
   * @inheritdoc
   */
  public static function create($filePath, $type = self::GAZZETTA) {
    if (!file_exists($filePath)) {
      throw new Exception('File does not exist.');
    }

    switch ($type) {
      case self::GAZZETTA:
        return new GazzettaQuotationsParser(
          new SpreadsheetReader($filePath),
          new GazzettaQuotationsNormalizer()
        );
        break;
      default:
        throw new Exception('The specific parser does not exist.');
    }
  }
}
