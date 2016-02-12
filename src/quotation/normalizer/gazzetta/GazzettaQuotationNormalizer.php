<?php

/**
 * @author Andrea Stronati <astronati@vendini.com>
 * @license MIT http://opensource.org/licenses/MIT
 * @copyright 2015 Andrea Stronati
 * @version 0.1.0
 */

// TODO Implement autoloader
include __DIR__ . '/../AbstractQuotationNormalizer.php';

/**
 * Defines a Gazzetta normalizer for all quotations
 */
class GazzettaQuotationsNormalizer extends AbstractQuotationNormalizer {

  /**
   * @inheritdoc
   */
  protected $_normalizationRules = array(
    'read' => array(
      'goal' => array(
        'operation' => '/',
        'value' => 3
      ),
      'cautions' => array(
        'operation' => '/',
        'value' => 0.5
      ),
      'penalties' => array(
        'operation' => '/',
        'value' => 3
      ),
      'autoGoals' => array(
        'operation' => '/',
        'value' => 3
      ),
    ),
    'write' => array(
      'goal' => array(
        'operation' => '*',
        'value' => 3
      ),
      'cautions' => array(
        'operation' => '*',
        'value' => 0.5
      ),
      'penalties' => array(
        'operation' => '*',
        'value' => 3
      ),
      'autoGoals' => array(
        'operation' => '*',
        'value' => 3
      ),
    )
  );
}
