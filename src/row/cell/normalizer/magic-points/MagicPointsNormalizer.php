<?php

/**
 * @author Andrea Stronati <stronati.a@gmail.com>
 * @license MIT http://opensource.org/licenses/MIT
 */

namespace FFQP\Row\Cell;

use \FFQP\Row\Cell\CellNormalizerInterface as CellNormalizerInterface;
use \FFQP\Row\Data\RawData as RawData;

/**
 * Normalizes the "magicGoals" value
 */
class MagicPointsNormalizer implements CellNormalizerInterface
{
  /**
   * @inheritdoc
   * @see CellNormalizerInterface::normalize()
   */
  public function normalize($value, RawData $rawData, $season = null): float {
    return (float) str_replace(',', '.', $value);
  }
}
