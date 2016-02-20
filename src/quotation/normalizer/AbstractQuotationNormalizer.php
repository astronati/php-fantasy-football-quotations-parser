<?php

/**
 * @author Andrea Stronati <astronati@vendini.com>
 * @license MIT http://opensource.org/licenses/MIT
 * @copyright 2015 Andrea Stronati
 * @version 0.1.0
 */

/**
 * Defines an abstract class for a generic normalizer.
 */
abstract class AbstractQuotationNormalizer implements QuotationNormalizerInterface {

  /**
   * Defines all rules to normalize/denormalize the values of the sent array.
   * @type array
   */
  protected $_normalizationRules = array();

  private function _adjustValues(array $quotation, $type = 'normalize') {
    $adjustedValues = array();
    foreach ($quotation as $field => $value) {
      if (array_key_exists($field,  $this->_normalizationRules[$type])) {
        $normalizationRule = $this->_normalizationRules[$type][$field];
        $adjustedValues[$field] = eval('return ' . $value . $normalizationRule['operation'] . $normalizationRule['value'] . ';');
      }
      else {
        $adjustedValues[$field] = $value;
      }
    }
    return $adjustedValues;
  }

  /**
   * @inheritdoc
   */
  public function normalize(array $quotation) {
    return $this->_adjustValues($quotation, 'normalize');
  }

  /**
   * @inheritdoc
   */
  public function denormalize(array $quotation) {
    return $this->_adjustValues($quotation, 'denormalize');
  }
}
