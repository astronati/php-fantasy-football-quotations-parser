<?php

namespace FFQP\Model;

/**
 * A quotation is a values set that is assigned per each footballer after each match day (championship or cup).
 */
class Quotation
{
    const CODE = 'code';
    const PLAYER = 'player';
    const TEAM = 'team';
    const ROLE = 'role';
    const SECONDARY_ROLE = 'secondaryRole';
    const ACTIVE = 'active';
    const QUOTATION = 'quotation';
    const MAGIC_POINTS = 'magicPoints';
    const ORIGINAL_MAGIC_POINTS = 'originalMagicPoints';
    const VOTE = 'vote';
    const GOALS_MAGIC_POINTS = 'goalsMagicPoints';
    const GOALS = 'goals';
    const YELLOW_CARDS_MAGIC_POINTS = 'yellowCardsMagicPoints';
    const YELLOW_CARDS = 'yellowCards';
    const RED_CARDS_MAGIC_POINTS = 'redCardsMagicPoints';
    const RED_CARDS = 'redCards';
    const PENALTIES_MAGIC_POINTS = 'penaltiesMagicPoints';
    const PENALTIES = 'penalties';
    const AUTO_GOALS_MAGIC_POINTS = 'autoGoalsMagicPoints';
    const AUTO_GOALS = 'autoGoals';
    const ASSISTS_MAGIC_POINTS = 'assistsMagicPoints';
    const ASSISTS = 'assists';

    /**
     * @var string
     * @see QuotationInterface::getCode()
     */
    private $code;

    /**
     * @var string
     * @see QuotationInterface::getPlayer()
     */
    private $player;

    /**
     * @var string
     * @see QuotationInterface::getTeam()
     */
    private $team;

    /**
     * @var string
     * @see QuotationInterface::getRole()
     */
    private $role;

    /**
     * @var string
     * @see QuotationInterface::getSecondaryRole()
     */
    private $secondaryRole;

    /**
     * @var bool
     * @see QuotationInterface::isActive()
     */
    private $active;

    /**
     * @var int
     * @see QuotationInterface::getQuotation()
     */
    private $quotation;

    /**
     * @var float|null
     * @see QuotationInterface::getMagicPoints()
     */
    private $magicPoints = null;

    /**
     * @var float|null
     * @see QuotationInterface::getOriginalMagicPoints()
     */
    private $originalMagicPoints = null;

    /**
     * @var float|null
     * @see QuotationInterface::getVote()
     */
    private $vote = null;

    /**
     * @var float
     * @see QuotationInterface::getGoalsMagicPoints()
     */
    private $goalsMagicPoints = 0;

    /**
     * @var int
     * @see QuotationInterface::getGoals()
     */
    private $goals = 0;

    /**
     * @var float
     * @see QuotationInterface::getYellowCardMagicPoints()
     */
    private $yellowCardsMagicPoints = 0;

    /**
     * The number of yellow cards assigned to the footballer.
     * @var int
     * @see QuotationInterface::isCautioned()
     */
    private $yellowCards = 0;

    /**
     * @var float
     * @see QuotationInterface::getRedCardMagicPoints()
     */
    private $redCardsMagicPoints = 0;

    /**
     * The number of red cards assigned to the footballer.
     * @var int
     * @see QuotationInterface::isSentOff()
     */
    private $redCards = 0;

    /**
     * @var float
     * @see QuotationInterface::getPenaltiesMagicPoints()
     */
    private $penaltiesMagicPoints = 0;

    /**
     * @var int
     * @see QuotationInterface::getPenalties()
     */
    private $penalties = 0;

    /**
     * @var float
     * @see QuotationInterface::getAutoGoalsMagicPoints()
     */
    private $autoGoalsMagicPoints = 0;

    /**
     * @var int
     * @see QuotationInterface::getAutoGoals()
     */
    private $autoGoals = 0;

    /**
     * @var float
     * @see QuotationInterface::getAssistsMagicPoints()
     */
    private $assistsMagicPoints = 0;

    /**
     * @var int
     * @see QuotationInterface::getAssists()
     */
    private $assists = 0;

    /**
     * Returns the identifier of the footballer for the newspaper.
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * Returns the full name of the footballer.
     * @return string
     */
    public function getPlayer(): string
    {
        return $this->player;
    }

    /**
     * Returns the name of the footballer team.
     * @return string
     */
    public function getTeam(): string
    {
        return $this->team;
    }

    /**
     * Returns the role of the footballer.
     * It is a char (1) such as: 'P' (Goalkeeper), 'D' (Defender), 'C' (Midfielder), 'T' (Playmaker) or 'A'
     * (Forward).
     * @return string
     */
    public function getRole(): string
    {
        return $this->role;
    }

    /**
     * Returns the secondary (original) role of the footballer. This is available from the season 2015/16.
     * The difference with 'getRole' is that a 'T' role has own corresponding 'C' or 'A'.
     * @see getRole
     * @return string
     */
    public function getSecondaryRole(): string
    {
        return $this->secondaryRole;
    }

    /**
     * Determines whether the footballer is no longer active for the current league or better whether the footballer is
     * still playing in the Serie A.
     * @return boolean
     */
    public function isActive(): bool
    {
        return $this->active === true;
    }

    /**
     * Returns the market value of the footballer. The value is expressed in Fantasy Millions (FMln).
     * @return int
     */
    public function getQuotation(): int
    {
        return $this->quotation;
    }

    /**
     * Returns the Magic Points assigned to the footballer.
     * The step is of 0.5 so you can find values such as 5, 5.5, 6,...
     * This value includes bonus and malus calculated with the rules of the own season.
     * @return float|null
     */
    public function getMagicPoints(): ?float
    {
        return $this->magicPoints;
    }

    /**
     * Returns the Magic Points assigned to the footballer.
     * The step is of 0.5 so you can find values such as 5, 5.5, 6,...
     * This value includes bonus and malus calculated with the classic rules.
     * @return float|null
     */
    public function getOriginalMagicPoints(): ?float
    {
        return $this->originalMagicPoints;
    }

    /**
     * Returns the vote on report card of the footballer.
     * The step is of 0.5 so you can find values such as 5, 5.5, 6,...
     * @return float|null
     */
    public function getVote(): ?float
    {
        return $this->vote;
    }

    /**
     * Determines if the footballer has played or not.
     * @return bool
     */
    public function hasPlayed(): bool
    {
        return !is_null($this->getMagicPoints());
    }

    /**
     * Determines if the footballer has been marked as S.V. (without vote) by the newspaper.
     * @return bool
     */
    public function isWithoutVote(): bool
    {
        return is_null($this->getVote());
    }

    /**
     * Returns the magic points associated to the goals scored or conceded by the footballer.
     * @return float
     */
    public function getGoalsMagicPoints(): float
    {
        return $this->goalsMagicPoints;
    }

    /**
     * Returns the number of goals scored or conceded by the footballer.
     * @return int
     */
    public function getGoals(): int
    {
        return $this->goals;
    }

    /**
     * Returns the magic points associated to the yellow card.
     * @return float
     */
    public function getYellowCardMagicPoints(): float
    {
        return $this->yellowCardsMagicPoints;
    }

    /**
     * Determines whether the footballer is cautioned or not.
     * @return boolean
     */
    public function isCautioned(): bool
    {
        return $this->yellowCards > 0;
    }

    /**
     * Returns the magic points associated to the red card.
     * @return float
     */
    public function getRedCardMagicPoints(): float
    {
        return $this->redCardsMagicPoints;
    }

    /**
     * Determines whether the footbaler is sent off or not.
     * @return boolean
     */
    public function isSentOff(): bool
    {
        return $this->redCards > 0;
    }

    /**
     * Returns the magic points associated to number of penalties.
     * @return float
     */
    public function getPenaltiesMagicPoints(): float
    {
        return $this->penaltiesMagicPoints;
    }

    /**
     * Returns the number of penalties:
     * It's a bonus if the footballer is a goalkeeper: it means that he saved one or more penalties.
     * It's a malus if the footballer missed one or more penalties.
     * @return int
     */
    public function getPenalties(): int
    {
        return $this->penalties;
    }

    /**
     * Returns the magic points associated to number of auto goals.
     * @return float
     */
    public function getAutoGoalsMagicPoints(): float
    {
        return $this->autoGoalsMagicPoints;
    }

    /**
     * Returns the number of auto goals, footballer did.
     * @return int
     */
    public function getAutoGoals(): int
    {
        return $this->autoGoals;
    }

    /**
     * Returns the magic points associated to number of assists.
     * @return float
     */
    public function getAssistsMagicPoints(): float
    {
        return $this->assistsMagicPoints;
    }

    /**
     * Returns the number of assists performed by footballer.
     * @return int
     */
    public function getAssists(): int
    {
        return $this->assists;
    }

    /**
     * @param string $code
     * @param string $player
     * @param string $team
     * @param string $role
     * @param string $secondaryRole
     * @param bool $active
     * @param int $quotation
     * @param float|null $magicPoints
     * @param float|null $originalMagicPoints
     * @param float|null $vote
     * @param float $goalsMagicPoints
     * @param int $goals
     * @param float $yellowCardsMagicPoints
     * @param int $yellowCards
     * @param float $redCardsMagicPoints
     * @param int $redCards
     * @param float $penaltiesMagicPoints
     * @param int $penalties
     * @param float $autoGoalsMagicPoints
     * @param int $autoGoals
     * @param float $assistsMagicPoints
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
      ?float $magicPoints,
      ?float $originalMagicPoints,
      ?float $vote,
      float $goalsMagicPoints,
      int $goals,
      float $yellowCardsMagicPoints,
      int $yellowCards,
      float $redCardsMagicPoints,
      int $redCards,
      float $penaltiesMagicPoints,
      int $penalties,
      float $autoGoalsMagicPoints,
      int $autoGoals,
      float $assistsMagicPoints,
      int $assists
    )
    {
        $this->code = $code;
        $this->player = $player;
        $this->team = $team;
        $this->role = $role;
        $this->secondaryRole = $secondaryRole;
        $this->active = $active;
        $this->quotation = $quotation;
        $this->magicPoints = $magicPoints;
        $this->originalMagicPoints = $originalMagicPoints;
        $this->vote = $vote;
        $this->goalsMagicPoints = $goalsMagicPoints;
        $this->goals = $goals;
        $this->yellowCardsMagicPoints = $yellowCardsMagicPoints;
        $this->yellowCards = $yellowCards;
        $this->redCardsMagicPoints = $redCardsMagicPoints;
        $this->redCards = $redCards;
        $this->penaltiesMagicPoints = $penaltiesMagicPoints;
        $this->penalties = $penalties;
        $this->autoGoalsMagicPoints = $autoGoalsMagicPoints;
        $this->autoGoals = $autoGoals;
        $this->assistsMagicPoints = $assistsMagicPoints;
        $this->assists = $assists;
    }
}
