<?php

/**
 * @author Andrea Stronati <stronati.a@gmail.com>
 * @license MIT http://opensource.org/licenses/MIT
 */

namespace FFQP\Row\Map;

use \FFQP\Row\Map\RowMapAbstract as RowMapAbstract;

/**
 * Defines the position of fields from the season 2015/2016
 */
class SeasonMap2015 extends RowMapAbstract
{

  public $season = '2015';

  /**
   * The map valid for spreadsheets from the season 2015/2016
   * @var array
   */
  protected $_map = [
    self::CODE => 1,
    self::PLAYER => 2,
    self::TEAM => 3,
    self::ROLE => 4,
    self::SECONDARY_ROLE => 5,
    self::ACTIVE => 6,
    self::QUOTATION => 7,
    self::MAGIC_POINTS => 8,
    self::VOTE => 9,
    self::GOALS => 10,
    self::YELLOW_CARDS => 11,
    self::RED_CARDS => 12,
    self::PENALTIES => 13,
    self::AUTOGOALS => 14,
    self::ASSISTS => 15,
  ];
}
