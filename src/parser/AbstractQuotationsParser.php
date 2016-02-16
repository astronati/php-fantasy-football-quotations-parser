<?php

/**
 * @author Andrea Stronati <astronati@vendini.com>
 * @license MIT http://opensource.org/licenses/MIT
 * @copyright 2015 Andrea Stronati
 * @version 0.1.0
 */

/**
 * Defines an abstract class for a generic parser.
 */
abstract class AbstractQuotationsParser implements QuotationsParserInterface {

  /**
   * The footballer ID.
   * @type string
   */
  const CODE = 'code';

  /**
   * The last name or the full name of the footballer
   * @type string
   */
  const PLAYER = 'player';

  /**
   * The name of the team of the footballer
   * @type string
   */
  const TEAM = 'team';

  /**
   * The role of the footballer.
   * @type string
   */
  const ROLE = 'role';

  /**
   * The secondary role of the footballer.
   * @type string
   */
  const SECONDARY_ROLE = 'secondaryRole';

  /**
   * The status of the footballer.
   * @type string
   */
  const STATUS = 'status';

  /**
   * The quotation of the footballer.
   * @type string
   */
  const QUOTATION = 'quotation';

  /**
   * The magic points of the footballer.
   * @type string
   */
  const MAGIC_POINTS = 'magicPoints';

  /**
   * The vote of the footballer.
   * @type string
   */
  const VOTE = 'vote';

  /**
   * The goals scored/saved by the footballer.
   * @type string
   */
  const GOALS = 'goals';

  /**
   * The cautions of the footballer.
   * @type string
   */
  const CAUTIONS = 'cautions';

  /**
   * The expulsion of the footballer.
   * @type string
   */
  const EXPULSION = 'expulsion';

  /**
   * Penalties scored/saved by the footballer
   * @type string
   */
  const PENALTIES = 'penalties';

  /**
   * Auto goals scored by the footballer.
   * @type string
   */
  const AUTO_GOALS = 'autoGoals';

  /**
   * Assists done by the footballer.
   * @type string
   */
  const ASSISTS = 'assists';

  /**
   * The reader object of the file.
   *
   * @example "new Spreadsheet_Excel_Reader($filePath)"
   * @type object
   */
  protected $_reader;

  /**
   * Normalizer instance.
   * The normalization usually consists in an arithmetic operation such as:
   * goals = 3 (The value, not the number of goals) ==> goals / 3 = 1 (the number of goals).
   *
   * @type AbstractQuotationNormalizer
   */
  protected $_normalizer;

  /**
   * Defines cells indexes to retrieve data of each single field.
   *
   * @type array
   */
  protected $_fields = array(
    self::CODE,
    self::PLAYER,
    self::TEAM,
    self::ROLE,
    self::SECONDARY_ROLE,
    self::STATUS,
    self::QUOTATION,
    self::MAGIC_POINTS,
    self::VOTE,
    self::GOALS,
    self::CAUTIONS,
    self::EXPULSION,
    self::PENALTIES,
    self::AUTO_GOALS,
    self::ASSISTS,
  );

  /**
   * Instantiates a new parser storing the reader object.
   *
   * @param \PHPExcelReader\SpreadsheetReader $reader
   * @param QuotationNormalizerInterface $normalizer
   *
   * @see AbstractQuotationsNormalizer.php;
   */
  public function __construct(\PHPExcelReader\SpreadsheetReader $reader, QuotationNormalizerInterface $normalizer) {
    $this->_reader = $reader;
    $this->_normalizer = $normalizer;
  }

  abstract public function getQuotations($isNormalizingEnabled = false);

  abstract public function getMatchDayNumber();

  abstract public function getNewspaper();

  /**
   * @inheritdoc
   */
  public function getFields() {
    return $this->_fields;
  }
}
