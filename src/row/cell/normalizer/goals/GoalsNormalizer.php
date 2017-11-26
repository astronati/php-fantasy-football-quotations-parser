<?php

/**
 * @author Andrea Stronati <stronati.a@gmail.com>
 * @license MIT http://opensource.org/licenses/MIT
 */

namespace FFQP\Row\Cell;

use \FFQP\Row\Cell\CellNormalizerInterface as CellNormalizerInterface;
use \FFQP\Row\Data\RawData as RawData;

/**
 * Normalizes the "goals" value
 */
class GoalsNormalizer implements CellNormalizerInterface
{
  /**
   * @inheritdoc
   * @see CellNormalizerInterface::normalize()
   */
  public function normalize($value, RawData $rawData, $season = null): int {
    $malus = 0;
    $bonus = (float) $value;

    if ($bonus == 0) {
      return 0;
    }

    if ($bonus < 0) {
      $malus = $bonus;
    }

    // Malus for goalkeepers per each gol is -1
    if ($malus < 0 && $rawData->role == $rawData::GOALKEEPER) {
      return abs($malus);
    }

    if ($season == '2017') {
      switch($rawData->secondaryRole) {
        case $rawData::GOALKEEPER:
          return $bonus / 5;
        case $rawData::DEFENDER:
          return $bonus / 4.5;
        case $rawData::MIDFIELDER:
          return $bonus / 4;
        case $rawData::PLAYMAKER:
          return $bonus / 3.5;
        case $rawData::FORWARD:
          return $bonus / 3;
      }
    }

    return $bonus / 3;
  }
}
