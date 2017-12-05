<?php

/**
 * @author Andrea Stronati <stronati.a@gmail.com>
 * @license MIT http://opensource.org/licenses/MIT
 */

namespace FFQP\Row\Data;

/**
 * A representation of what can be extracted from a row
 */
class RowData extends DataAbstract
{
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
     * @var string|integer
     */
    public $status;

    /**
     * The market value of the footballer. The value is expressed in Fantasy Millions (FMln).
     * @var integer
     */
    public $quotation;

    /**
     * The Magic Points assigned to the footballer.
     * The step is of 0.5 so you can find values such as 5, 5.5, 6,...
     * @var float
     */
    public $magicPoints = null;

    /**
     * The vote on report card of the footballer.
     * The step is of 0.5 so you can find values such as 5, 5.5, 6,...
     * @var float
     */
    public $vote = null;

    /**
     * The bonus from the scored goals
     * @var float
     */
    public $goals = 0;

    /**
     * The malus from the assigned yellow cards
     * @var float
     */
    public $yellowCards = 0;

    /**
     * The malus from the assigned yellow cards
     * @var float
     */
    public $redCards = 0;

    /**
     * The malus/bonus from saved or missed penalties
     * @var float
     */
    public $penalties = 0;

    /**
     * The malus from the scored autogoals
     * @var float
     */
    public $autoGoals = 0;

    /**
     * The bonus from the assists made from the footballer
     * @var float
     */
    public $assists = 0;

    /**
     * @param string $code
     * @param string $player
     * @param string $team
     * @param string $role
     * @param string $secondaryRole
     * @param int|string $status
     * @param int $quotation
     * @param float $magicPoints
     * @param float $vote
     * @param float $goals
     * @param float $yellowCards
     * @param float $redCards
     * @param float $penalties
     * @param float $autoGoals
     * @param float $assists
     */
    public function __construct(
        string $code,
        string $player,
        string $team,
        string $role,
        string $secondaryRole,
        $status,
        int $quotation,
        float $magicPoints,
        float $vote,
        float $goals,
        float $yellowCards,
        float $redCards,
        float $penalties,
        float $autoGoals,
        float $assists
    ) {
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
