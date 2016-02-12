<?php

/**
 * @author Andrea Stronati <astronati@vendini.com>
 * @license MIT http://opensource.org/licenses/MIT
 * @copyright 2015 Andrea Stronati
 * @version 0.1.0
 */

// TODO Implement autoloader
include __DIR__ . '/QuotationNormalizerInterface.php';

/**
 * Defines an abstract class for a generic normalizer.
 */
abstract class AbstractQuotationNormalizer implements QuotationNormalizerInterface {

  /**
   * Defines all rules to normalize/denormalize the values of the sent array.
   * @type array
   */
  protected $_normalizationRules = array();

  /**
   * @inheritdoc
   */
  public function normalize(array $quotation) {
    $normalizedValues = array();
    foreach ($quotation as $field => $value) {
      if (array_key_exists($field,  $this->_normalizationRules['read'])) {
        $normalizationRule = $this->_normalizationRules['read'][$field];
        $normalizedValues[$field] = eval($value . $normalizationRule['operation'] . $normalizationRule['value']);
      }
      else {
        $normalizedValues[$field] = $value;
      }
    }
    return $normalizedValues;
  }

  /**
   * @inheritdoc
   */
  public function denormalize(array $quotations) {
    // TODO Implement method
  }
}
