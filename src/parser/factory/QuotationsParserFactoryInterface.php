<?php

/**
 * @author Andrea Stronati <astronati@vendini.com>
 * @license MIT http://opensource.org/licenses/MIT
 * @copyright 2015 Andrea Stronati
 * @version 0.2.0
 */

/**
 * A parser factory is used to define a specific parser with all dependencies.
 */
interface QuotationsParserFactoryInterface {

  /**
   * Instantiates a specific parser.
   *
   * @param string $filePath
   * @param integer $type
   * @return AbstractQuotationsParser
   * @see SpreadsheetReader.php
   * @throws Exception if the file doesn't exist.
   * @throws Exception if the type is not supported.
   */
  public static function create($filePath, $type);
}
