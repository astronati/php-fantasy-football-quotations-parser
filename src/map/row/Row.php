<?php

namespace FFQP\Map\Row;

/**
 * A representation of what can be extracted from a row.
 */
class Row
{
    // Roles
    public const GOALKEEPER = 'P';
    public const DEFENDER = 'D';
    public const MIDFIELDER = 'C';
    public const PLAYMAKER = 'T';
    public const FORWARD = 'A';

    /**
     * The footballer code
     * @var string
     */
    public $code;

    /**
     * The full name of the footballer.
     * @var string
     */
    public $player;

    /**
     * The name of the footballer team.
     * @var string
     */
    public $team;

    /**
     * The role of the footballer.
     * It is a char (1) such as: 'P' (Goalkeeper), 'D' (Defender), 'C' (Midfielder), 'T' (Playmaker) or 'A'
     * (Forward).
     * @var string
     */
    public $role;

    /**
     * The secondary role of the footballer. This is available from the season 2015/16.
     * @var string
     */
    public $secondaryRole;

    /**
     * A code to identity if the footballer is still active
     * @var string
     */
    public $status;

    /**
     * The market value of the footballer. The value is expressed in Fantasy Millions (FMln).
     * @var string
     */
    public $quotation;

    /**
     * The Magic Points assigned to the footballer.
     * The step is of 0.5 so you can find values such as 5, 5.5, 6,...
     * @var string
     */
    public $magicPoints = null;

    /**
     * The vote on report card of the footballer.
     * The step is of 0.5 so you can find values such as 5, 5.5, 6,...
     * @var string
     */
    public $vote = null;

    /**
     * The bonus from the scored goals
     * @var string
     */
    public $goals = 0;

    /**
     * The malus from the assigned yellow cards
     * @var string
     */
    public $yellowCards = 0;

    /**
     * The malus from the assigned yellow cards
     * @var string
     */
    public $redCards = 0;

    /**
     * The malus/bonus from saved or missed penalties
     * @var string
     */
    public $penalties = 0;

    /**
     * The malus from the scored autogoals
     * @var string
     */
    public $autoGoals = 0;

    /**
     * The bonus from the assists made from the footballer
     * @var string
     */
    public $assists = 0;

    /**
     * @param string $code
     * @param string $player
     * @param string $team
     * @param string $role
     * @param string $secondaryRole
     * @param string $status
     * @param string $quotation
     * @param string $magicPoints
     * @param string $vote
     * @param string $goals
     * @param string $yellowCards
     * @param string $redCards
     * @param string $penalties
     * @param string $autoGoals
     * @param string $assists
     */
    public function __construct(
      string $code,
      string $player,
      string $team,
      string $role,
      string $secondaryRole,
      string $status,
      string $quotation,
      string $magicPoints,
      string $vote,
      string $goals,
      string $yellowCards,
      string $redCards,
      string $penalties,
      string $autoGoals,
      string $assists
    )
    {
        $this->code = $code;
        $this->player = $player;
        $this->team = $team;
        $this->role = $role;
        $this->secondaryRole = $secondaryRole;
        $this->status = $status;
        $this->quotation = $quotation;
        $this->magicPoints = $magicPoints;
        $this->vote = $vote;
        $this->goals = $goals;
        $this->yellowCards = $yellowCards;
        $this->redCards = $redCards;
        $this->penalties = $penalties;
        $this->autoGoals = $autoGoals;
        $this->assists = $assists;
    }
}
