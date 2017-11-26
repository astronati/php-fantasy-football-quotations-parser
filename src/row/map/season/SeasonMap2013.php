<?php

/**
 * @author Andrea Stronati <stronati.a@gmail.com>
 * @license MIT http://opensource.org/licenses/MIT
 */

namespace FFQP\Row\Map;

use \FFQP\Row\Map\RowMapAbstract as RowMapAbstract;

/**
 * Defines the position of fields from the season 2013/2014
 */
class SeasonMap2013 extends RowMapAbstract
{

    public $season = '2013';

    /**
     * The map valid for spreadsheets from the season 2013/2014
     * @var array
     */
    protected $_map = [
      self::CODE => 1,
      self::PLAYER => 2,
      self::TEAM => 3,
      self::ROLE => 4,
      self::SECONDARY_ROLE => 4,
      self::ACTIVE => 5,
      self::QUOTATION => 6,
      self::MAGIC_POINTS => 7,
      self::VOTE => 8,
      self::GOALS => 9,
      self::YELLOW_CARDS => 10,
      self::RED_CARDS => 11,
      self::PENALTIES => 12,
      self::AUTOGOALS => 13,
      self::ASSISTS => 14,
    ];
}
