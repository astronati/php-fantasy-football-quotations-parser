<?php

/**
 * @author Andrea Stronati <astronati@vendini.com>
 * @license MIT http://opensource.org/licenses/MIT
 * @copyright 2015 Andrea Stronati
 * @version 0.1.0
 */

/**
 * Used to retrieve quotations and soccer player information from an *.xls file
 * that is provided by the Gazzetta dello Sport.
 * 
 * @see <http://magic.gazzetta.it>
 */
class GazzettaQuotationsParser extends AbstractQuotationsParser {

  /**
   * @inheritdoc
   */
  public function getQuotations($isNormalizingEnabled = false) {
    $quotations = array();

    for ($i = 4; $i < $this->_reader->rowcount(); $i++) {
      $config = array();
      foreach ($this->getFields() as $index => $field) {
        $config[$field] = $this->_reader->val($i, $index + 1);
      }
      $quotation = new Quotation($config);
      $quotationToArray = $quotation->toArray($this->getFields());
      $quotations[$quotation->getCode()] = $isNormalizingEnabled ? $this->_normalizer->normalize($quotationToArray) : $quotationToArray;
    }

    return $quotations;
  }

  /**
   * @inheritdoc
   */
  public function getMatchDayNumber() {
    // The first cell contains the information of the day of the match.
    $header = $this->_reader->val(0, 0);
    $matchNumberPosition = strpos($header, 'N.');
    if ($matchNumberPosition === false) {
      return null;
    }

    return substr($header, $matchNumberPosition + 2);
  }

  /**
   * @inheritdoc
   */
  public function getNewspaper() {
    return 'La Gazzetta dello Sport';
  }
}
