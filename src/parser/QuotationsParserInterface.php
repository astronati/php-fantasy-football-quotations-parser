<?php

/**
 * @author Andrea Stronati <astronati@vendini.com>
 * @license MIT http://opensource.org/licenses/MIT
 * @copyright 2015 Andrea Stronati
 * @version 0.1.0
 */

/**
 * Describes the interface of a quotations parser.
 */
interface QuotationsParserInterface {

  /**
   * Returns the quotations of the soccer players.
   * NOTE The first row of the result is at index equals to 1 (one) unline an array where the first element is at
   * index equals to 0 (zero).
   *
   * @api
   * @param boolean $isNormalizingEnabled
   * @return array The structure of the array is the following one:
   * array(
   *  'footballerCode' => array(
   *    'code' => 123,
   *    'abc' => abc, ...
   *  ),
   *  'footballerCode2' => array(
   *   ...
   *  )
   * )
   */
  public function getQuotations($isNormalizingEnabled = false);

  /**
   * Returns the number of the match.
   *
   * @api
   * @return integer
   */
  public function getMatchDayNumber();

  /**
   * Returns the newspaper providing quotations.
   *
   * @api
   * @return string
   */
  public function getNewspaper();

  /**
   * Returns a container of fields you can find in the document to parse.
   *
   * @return array
   */
  public function getFields();
}
