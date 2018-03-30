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
    const GOALS = 'goals';
    const YELLOW_CARDS = 'yellowCards';
    const RED_CARDS = 'redCards';
    const PENALTIES = 'penalties';
    const AUTO_GOALS = 'autoGoals';
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
     * @var int
     * @see QuotationInterface::getGoals()
     */
    private $goals = 0;

    /**
     * The number of yellow cards assigned to the footballer.
     * @var int
     * @see QuotationInterface::isCautioned()
     */
    private $yellowCards = 0;

    /**
     * The number of red cards assigned to the footballer.
     * @var int
     * @see QuotationInterface::isSentOff()
     */
    private $redCards = 0;

    /**
     * @var int
     * @see QuotationInterface::getPenalties()
     */
    private $penalties = 0;

    /**
     * @var int
     * @see QuotationInterface::getAutoGoals()
     */
    private $autoGoals = 0;

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
     * @see QuotationInterface::getGoals()
     */
    public function getGoals(): int
    {
        return $this->goals;
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
     * @see QuotationInterface::isSentOff()
     */
    public function isSentOff(): bool
    {
        return $this->redCards > 0;
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
     * @see QuotationInterface::getAutoGoals()
     */
    public function getAutoGoals(): int
    {
        return $this->autoGoals;
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
      ?float $magicPoints,
      ?float $originalMagicPoints,
      ?float $vote,
      int $goals,
      int $yellowCards,
      int $redCards,
      int $penalties,
      int $autoGoals,
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
        $this->goals = $goals;
        $this->yellowCards = $yellowCards;
        $this->redCards = $redCards;
        $this->penalties = $penalties;
        $this->autoGoals = $autoGoals;
        $this->assists = $assists;
    }
}
