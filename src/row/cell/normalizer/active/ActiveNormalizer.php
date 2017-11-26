<?php

/**
 * @author Andrea Stronati <stronati.a@gmail.com>
 * @license MIT http://opensource.org/licenses/MIT
 */

namespace FFQP\Row\Cell;

use \FFQP\Row\Cell\CellNormalizerInterface as CellNormalizerInterface;
use \FFQP\Row\Data\RawData as RawData;

/**
 * Normalizes the "active" value
 */
class ActiveNormalizer implements CellNormalizerInterface
{
  /**
   * @inheritdoc
   * @see CellNormalizerInterface::normalize()
   */
  public function normalize($value, RawData $rawData, $season = null): bool {
    return ((int) $value) === 1 || $value === 'SI';
  }
}
