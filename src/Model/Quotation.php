<?php

namespace FFQP\Model;

/**
 * @see QuotationInterface
 */
class Quotation implements QuotationInterface
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
     * @inheritdoc
     * @see QuotationInterface::getCode()
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @inheritdoc
     * @see QuotationInterface::getPlayer()
     */
    public function getPlayer(): string
    {
        return $this->player;
    }

    /**
     * @inheritdoc
     * @see QuotationInterface::getTeam()
     */
    public function getTeam(): string
    {
        return $this->team;
    }

    /**
     * @inheritdoc
     * @see QuotationInterface::getRole()
     */
    public function getRole(): string
    {
        return $this->role;
    }

    /**
     * @inheritdoc
     * @see QuotationInterface::getSecondaryRole()
     */
    public function getSecondaryRole(): string
    {
        return $this->secondaryRole;
    }

    /**
     * @inheritdoc
     * @see QuotationInterface::isActive()
     */
    public function isActive(): bool
    {
        return $this->active === true;
    }

    /**
     * @inheritdoc
     * @see QuotationInterface::getQuotation()
     */
    public function getQuotation(): int
    {
        return $this->quotation;
    }

    /**
     * @inheritdoc
     * @see QuotationInterface::getMagicPoints()
     */
    public function getMagicPoints(): ?float
    {
        return $this->magicPoints;
    }

    /**
     * @inheritdoc
     * @see QuotationInterface::getOriginalMagicPoints()
     */
    public function getOriginalMagicPoints(): ?float
    {
        return $this->originalMagicPoints;
    }

    /**
     * @inheritdoc
     * @see QuotationInterface::getVote()
     */
    public function getVote(): ?float
    {
        return $this->vote;
    }

    /**
     * @inheritdoc
     * @see QuotationInterface::hasPlayed()
     */
    public function hasPlayed(): bool
    {
        return !is_null($this->getMagicPoints());
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
     * @see QuotationInterface::getGoalsMagicPoints()
     */
    public function getGoalsMagicPoints(): float
    {
        return $this->goalsMagicPoints;
    }

    /**
     * @inheritdoc
     * @see QuotationInterface::getGoals()
     */
    public function getGoals(): int
    {
        return $this->goals;
    }

    /**
     * @inheritdoc
     * @see QuotationInterface::getYellowCardMagicPoints
     */
    public function getYellowCardMagicPoints(): float
    {
        return $this->yellowCardsMagicPoints;
    }

    /**
     * @inheritdoc
     * @see QuotationInterface::isCautioned
     */
    public function isCautioned(): bool
    {
        return $this->yellowCards > 0;
    }

    /**
     * @inheritdoc
     * @see QuotationInterface::getRedCardMagicPoints
     */
    public function getRedCardMagicPoints(): float
    {
        return $this->redCardsMagicPoints;
    }

    /**
     * @inheritdoc
     * @see QuotationInterface::isSentOff()
     */
    public function isSentOff(): bool
    {
        return $this->redCards > 0;
    }

    /**
     * @inheritdoc
     * @see QuotationInterface::getPenaltiesMagicPoints
     */
    public function getPenaltiesMagicPoints(): float
    {
        return $this->penaltiesMagicPoints;
    }

    /**
     * @inheritdoc
     * @see QuotationInterface::getPenalties()
     */
    public function getPenalties(): int
    {
        return $this->penalties;
    }

    /**
     * @inheritdoc
     * @see QuotationInterface::getAutoGoalsMagicPoints
     */
    public function getAutoGoalsMagicPoints(): float
    {
        return $this->autoGoalsMagicPoints;
    }

    /**
     * @inheritdoc
     * @see QuotationInterface::getAutoGoals()
     */
    public function getAutoGoals(): int
    {
        return $this->autoGoals;
    }

    /**
     * @inheritdoc
     * @see QuotationInterface::getAssistsMagicPoints
     */
    public function getAssistsMagicPoints(): float
    {
        return $this->assistsMagicPoints;
    }

    /**
     * @inheritdoc
     * @see QuotationInterface::getAssists()
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
