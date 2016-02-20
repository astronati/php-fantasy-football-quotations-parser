<?php

/**
 * @author Andrea Stronati <astronati@vendini.com>
 * @license MIT http://opensource.org/licenses/MIT
 * @copyright 2015 Andrea Stronati
 * @version 0.1.0
 */

/**
 * Defines a Gazzetta normalizer for all quotations
 */
class GazzettaQuotationsNormalizer extends AbstractQuotationNormalizer {

  /**
   * @inheritdoc
   */
  protected $_normalizationRules = array(
    'normalize' => array(
    ),
    'denormalize' => array(
    ),
  );
}
