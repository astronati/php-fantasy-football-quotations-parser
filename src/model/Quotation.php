<?php

namespace FFQP\Model;

/**
 * A quotation is a values set that is assigned per each footballer after each match day (championship or cup).
 */
class Quotation implements QuotationInterface
{
    /**
     * The footballer code
     * @var string
     */
    private $_code;

    /**
     * The fullname of the footballer
     * @var string
     */
    private $_player;

    /**
     * The name of the soccer team
     * @var string
     */
    private $_team;

    /**
     * The role of the footballer
     * @var string
     */
    private $_role;

    /**
     * The secondary role of the footballer
     * @var string
     */
    private $_secondaryRole;

    /**
     * True if the footballer is still playing for the team
     * @var bool
     */
    private $_active;

    /**
     * The market value of the footballer. The value is expressed in Fantasy Millions (FMln).
     * @var int
     */
    private $_quotation;

    /**
     * The Magic Points assigned to the footballer.
     * The step is of 0.5 so you can find values such as 5, 5.5, 6,...
     * @var float
     */
    private $_magicPoints = null;

    /**
     * The vote on report card of the footballer.
     * The step is of 0.5 so you can find values such as 5, 5.5, 6,...
     * NOTE null for S.V. (without vote)
     * @var ?float
     */
    private $_vote = null;

    /**
     * The number of goals scored by the footballer.
     * @var int
     */
    private $_goals = 0;

    /**
     * The number of yellow cards assigned to the footballer.
     * @var int
     */
    private $_yellowCards = 0;

    /**
     *  The number of red cards assigned to the footballer.
     * @var int
     */
    private $_redCards = 0;

    /**
     * The number of penalties saved by goalkeeper or missed by footballer.
     * @var int
     */
    private $_penalties = 0;

    /**
     * The number of auto goals scored by the footballer.
     * @var int
     */
    private $_autoGoals = 0;

    /**
     * The number of assists made by the footballer.
     * @var int
     */
    private $_assists = 0;

    /**
     * @inheritdoc
     * @see QuotationInterface::getCode()
     */
    public function getCode(): string
    {
        return $this->_code;
    }

    /**
     * @inheritdoc
     * @see QuotationInterface::getPlayer()
     */
    public function getPlayer(): string
    {
        return $this->_player;
    }

    /**
     * @inheritdoc
     * @see QuotationInterface::getTeam()
     */
    public function getTeam(): string
    {
        return $this->_team;
    }

    /**
     * @inheritdoc
     * @see QuotationInterface::getRole()
     */
    public function getRole(): string
    {
        return $this->_role;
    }

    /**
     * @inheritdoc
     * @see QuotationInterface::getSecondaryRole()
     */
    public function getSecondaryRole(): string
    {
        return $this->_secondaryRole;
    }

    /**
     * @inheritdoc
     * @see QuotationInterface::isActive()
     */
    public function isActive(): bool
    {
        return $this->_active === true;
    }

    /**
     * @inheritdoc
     * @see QuotationInterface::getQuotation()
     */
    public function getQuotation(): int
    {
        return $this->_quotation;
    }

    /**
     * @inheritdoc
     * @see QuotationInterface::getMagicPoints()
     */
    public function getMagicPoints(): float
    {
        return $this->_magicPoints;
    }

    /**
     * @inheritdoc
     * @see QuotationInterface::getVote()
     */
    public function getVote(): ?float
    {
        return $this->_vote;
    }

    /**
     * @inheritdoc
     * @see QuotationInterface::hasPlayed()
     */
    public function hasPlayed(): bool
    {
        return $this->getMagicPoints() > 0;
    }

    /**
     * @inheritdoc
     * @see QuotationInterface::isWithoutVote()
     */
    public function isWithoutVote(): bool
    {
        return is_null($this->getVote());
    }

    /**
     * @inheritdoc
     * @see QuotationInterface::getGoals()
     */
    public function getGoals(): int
    {
        return $this->_goals;
    }

    /**
     * @inheritdoc
     * @see QuotationInterface::isCautioned
     */
    public function isCautioned(): bool
    {
        return $this->_yellowCards > 0;
    }

    /**
     * @inheritdoc
     * @see QuotationInterface::isSentOff()
     */
    public function isSentOff(): bool
    {
        return $this->_redCards > 0;
    }

    /**
     * @inheritdoc
     * @see QuotationInterface::getPenalties()
     */
    public function getPenalties(): int
    {
        return $this->_penalties;
    }

    /**
     * @inheritdoc
     * @see QuotationInterface::getAutoGoals()
     */
    public function getAutoGoals(): int
    {
        return $this->_autoGoals;
    }

    /**
     * @inheritdoc
     * @see QuotationInterface::getAssists()
     */
    public function getAssists(): int
    {
        return $this->_assists;
    }

    /**
     * @param string $code
     * @param string $player
     * @param string $team
     * @param string $role
     * @param string $secondaryRole
     * @param bool $active
     * @param int $quotation
     * @param float $magicPoints
     * @param float $vote
     * @param int $goals
     * @param int $yellowCards
     * @param int $redCards
     * @param int $penalties
     * @param int $autoGoals
     * @param int $assists
     */
    public function __construct(
      string $code,
      string $player,
      string $team,
      string $role,
      string $secondaryRole,
      bool $active,
      int $quotation,
      float $magicPoints,
      ?float $vote,
      int $goals,
      int $yellowCards,
      int $redCards,
      int $penalties,
      int $autoGoals,
      int $assists
    )
    {
        $this->_code = $code;
        $this->_player = $player;
        $this->_team = $team;
        $this->_role = $role;
        $this->_secondaryRole = $secondaryRole;
        $this->_active = $active;
        $this->_quotation = $quotation;
        $this->_magicPoints = $magicPoints;
        $this->_vote = $vote;
        $this->_goals = $goals;
        $this->_yellowCards = $yellowCards;
        $this->_redCards = $redCards;
        $this->_penalties = $penalties;
        $this->_autoGoals = $autoGoals;
        $this->_assists = $assists;
    }
}
