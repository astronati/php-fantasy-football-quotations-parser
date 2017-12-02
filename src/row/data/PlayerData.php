<?php

/**
 * @author Andrea Stronati <stronati.a@gmail.com>
 * @license MIT http://opensource.org/licenses/MIT
 */

namespace FFQP\Row\Data;

/**
 * A normalized representation of what can be extracted from a row
 */
class PlayerData extends DataAbstract
{
    /**
     * The footballer code
     * @var string
     */
    public $code;

    /**
     * The fullname of the footballer
     * @var string
     */
    public $player;

    /**
     * The name of the soccer team
     * @var string
     */
    public $team;

    /**
     * The role of the footballer
     * @var string
     */
    public $role;

    /**
     * The secondary role of the footballer
     * @var string
     */
    public $secondaryRole;

    /**
     * True if the footballer is still playing for the team
     * @var bool
     */
    public $active;

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
     * NOTE null for S.V. (without vote)
     * @var ?float
     */
    public $vote = null;

    /**
     * The number of goals scored by the footballer.
     * @var integer
     */
    public $goals = 0;

    /**
     * The number of yellow cards assigned to the footballer.
     * @var integer
     */
    public $yellowCards = 0;

    /**
     *  The number of red cards assigned to the footballer.
     * @var integer
     */
    public $redCards = 0;

    /**
     * The number of penalties saved by goalkeeper or missed by footballer.
     * @var integer
     */
    public $penalties = 0;

    /**
     * The number of auto goals scored by the footballer.
     * @var integer
     */
    public $autoGoals = 0;

    /**
     * The number of assists made by the footballer.
     * @var integer
     */
    public $assists = 0;

    /**
     * @param string $code
     * @param string $player
     * @param string $team
     * @param string $role
     * @param string $secondaryRole
     * @param bool $active
     * @param int $quotation
     * @param float $magicPoints
     * @param ?float $vote
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
    ) {
        $this->code = $code;
        $this->player = $player;
        $this->team = $team;
        $this->role = $role;
        $this->secondaryRole = $secondaryRole;
        $this->active = $active;
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
