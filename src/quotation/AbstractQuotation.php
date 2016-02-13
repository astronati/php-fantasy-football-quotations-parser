<?php

/**
 * @author Andrea Stronati <astronati@vendini.com>
 * @license MIT http://opensource.org/licenses/MIT
 * @copyright 2015 Andrea Stronati
 * @version 0.1.0
 */

/**
 * Abstract class for a quotation entity.
 * A quotation is a values set that is assigned to each footballer after each championship day.
 */
abstract class AbstractQuotation implements QuotationInterface {

  /**
   * Footballer ID.
   * @var integer
   */
  private $_code;

  /**
   * Footballer name (usually his last name).
   * @var string
   */
  private $_player;

  /**
   * Football team
   * @var string
   */
  private $_team;

  /**
   * Footballer role (e.g Goalkeeper, Defender, Midfielder or Forward).
   * Usually a char (1) such as: 'P', 'D', 'C', 'A'.
   * @var string
   */
  private $_role;

  /**
   * If 0 (zero) the player left the championship.
   * @var integer
   */
  private $_status;

  /**
   * Value of the player in Fantasy Millions
   * @var integer
   */
  private $_quotation;

  /**
   * Vote including all modifiers.
   * @var float
   */
  private $_magicPoints;

  /**
   * Vote without any modifier.
   * @var float
   */
  private $_vote;

  /**
   * Number of goals scored by player or conceded by goalkeeper.
   * @var integer
   */
  private $_goal;

  /**
   * Value due to a received caution to apply to the vote in order to obtain
   * the magic points value.
   * @var float
   */
  private $_cautions;

  /**
   * Value due to a received dismissal to apply to the vote in order to obtain
   * the magic points value.
   * @var float
   */
  private $_dismissals;

  /**
   * Value of scored/missed/saved penalties to apply to the vote in order to
   * obtain the magic points value.
   * @var integer
   */
  private $_penalties;

  /**
   * Value of autogoals to apply to the vote in order to obtain the magic
   * points value.
   * @var integer
   */
  private $_autogoals;

  /**
   * Value of assists to apply to the volte in order to obtain the magic
   * points value.
   * @var integer
   */
  private $_assists;

  /**
   * Checks if the configuration array has all needed parameters.
   *
   * @param array $params
   * @return boolean
   */
  private function _checkConfiguration(array $params) {
    $mandatoryParams = [
      'code', 'player', 'team', 'role', 'status', 'quotation',
      'magicPoints', 'vote', 'goal', 'cautions', 'dismissals',
      'penalties', 'autoGoals', 'assists'
    ];
    foreach ($mandatoryParams as $param) {
      if (!array_key_exists($param, $params)) {
        return false;
      }
    }
    return true;
  }

  /**
   * @param array $config Config parameter has to match following structure:
   * array(
   *  'code' => integer,
   *  'player' => string,
   *  'team' => string,
   *  'role' => string,
   *  'status' => integer,
   *  'quotation' => integer,
   *  'magicPoints' => float,
   *  'vote' => float,
   *  'goal' => integer,
   *  'cautions' => float,
   *  'dismissals' => integer,
   *  'penalties' => integer,
   *  'autoGoals' => integer,
   *  'assists' => integer,
   * )
   * @throws Exception Missing parameter
   */
  public function __construct(array $config) {
    if (!$this->_checkConfiguration($config)) {
      throw new Exception ("Missing parameter");
    }
    $this->_code = (int)$config['code'];
    $this->_player = (string)$config['player'];
    $this->_team = (string)$config['team'];
    $this->_role = (string)$config['role'];
    $this->_status = (int)$config['status'];
    $this->_quotation = (int)$config['quotation'];
    $this->_magicPoints = (float)$config['magicPoints'];
    $this->_vote = (float)$config['vote'];
    $this->_goal = (int)$config['goal'];
    $this->_cautions = (float)$config['cautions'];
    $this->_dismissals = (int)$config['dismissals'];
    $this->_penalties = (int)$config['penalties'];
    $this->_autogoals = (int)$config['autoGoals'];
    $this->_assists = (int)$config['assists'];
  }

  /**
   * @inheritdoc
   */
  public function getCode() {
    return $this->_code;
  }

  /**
   * @inheritdoc
   */
  public function getPlayer() {
    return $this->_player;
  }

  /**
   * @inheritdoc
   */
  public function getTeam() {
    return $this->_team;
  }

  /**
   * @inheritdoc
   */
  public function getRole() {
    return $this->_role;
  }

  /**
   * @inheritdoc
   */
  public function getStatus() {
    return $this->_status;
  }

  /**
   * @inheritdoc
   */
  public function getQuotation() {
    return $this->_quotation;
  }

  /**
   * @inheritdoc
   */
  public function getMagicPoints() {
    return $this->_magicPoints;
  }

  /**
   * @inheritdoc
   */
  public function getVote() {
      return $this->_vote;
  }

  /**
   * @inheritdoc
   */
  public function getCaution() {
    return $this->_cautions;
  }

  /**
   * @inheritdoc
   */
  public function getDismissal() {
    return $this->_dismissals;
  }

  /**
   * @inheritdoc
   */
  public function getPenalties() {
    return $this->_penalties;
  }

  /**
   * @inheritdoc
   */
  public function getAutoGoals() {
    return $this->_autogoals;
  }

  /**
   * @inheritdoc
   */
  public function getAssists() {
    return $this->_assists;
  }

  /**
   * @inheritdoc
   */
  public function toArray(array $fields) {
    $quotationArray = array();
    // e.g. ['code', 'player', ...]
    foreach ($fields as $field) {
      // e.g. 'getCode', 'getPlayer'
      $methodName = 'get' . ucfirst($field);
      $quotationArray[$field] = $this->$methodName();
    }

    return $quotationArray;
  }
}
