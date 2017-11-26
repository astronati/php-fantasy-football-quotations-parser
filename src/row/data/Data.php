<?php

/**
 * @author Andrea Stronati <stronati.a@gmail.com>
 * @license MIT http://opensource.org/licenses/MIT
 */

namespace FFQP\Row\Data;

use \FFQP\Row\Data\DataAbstract as DataAbstract;

/**
 * A normalized representation of what can be extracted from a row
 */
class Data extends DataAbstract
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
}
