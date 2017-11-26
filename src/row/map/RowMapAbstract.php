<?php

/**
 * @author Andrea Stronati <stronati.a@gmail.com>
 * @license MIT http://opensource.org/licenses/MIT
 */

namespace FFQP\Row\Map;

use \FFQP\Row\Map\RowMapInterface as RowMapInterface;

/**
 * Describes a generic map.
 */
abstract class RowMapAbstract implements RowMapInterface {

  // Fields
  const CODE = 'code';
  const PLAYER = 'player';
  const TEAM = 'team';
  const ROLE = 'role';
  const SECONDARY_ROLE = 'secondaryRole';
  const ACTIVE = 'active';
  const QUOTATION = 'quotation';
  const MAGIC_POINTS = 'magicPoints';
  const VOTE = 'vote';
  const GOALS = 'goals';
  const YELLOW_CARDS = 'yellowCards';
  const RED_CARDS = 'redCards';
  const PENALTIES = 'penalties';
  const AUTOGOALS = 'autoGoals';
  const ASSISTS = 'assists';

  /**
   * The season associated to the specific row map
   * @type string
   */
  public $season;

  /**
   * Saves the cell column per each field
   * @type array
   */
  protected $_map = array();

  /**
   * @inheritdoc
   * @see RowMapInterface::getOffset()
   */
  function getOffset($field): int {
    return $this->_map[$field];
  }

  /**
   * @inheritdoc
   * @see RowMapInterface::getFields()
   */
  public function getFields(): array
  {
    $reflection = new \ReflectionClass(__CLASS__);
    return $reflection->getConstants();
  }
}
