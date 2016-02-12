<?php

/**
 * @author Andrea Stronati <astronati@vendini.com>
 * @license MIT http://opensource.org/licenses/MIT
 * @copyright 2015 Andrea Stronati
 * @version 0.1.0
 */

/**
 * Used to normalize values provided by all newspapers in order to be consistent between them.
 */
interface QuotationNormalizerInterface {

  /**
   * Normalizes quotation values from an array that has all translation rules.
   *
   * @param array $quotation
   * @return array
   */
  public function normalize(array $quotation);

  /**
   * Denormalizes all quotation values from an array that has all translation rules.
   * All values are reset to their original value.
   *
   * @param array $quotation
   * @return array
   */
  public function denormalize(array $quotation);
}
