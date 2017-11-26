<?php

/**
 * @author Andrea Stronati <stronati.a@gmail.com>
 * @license MIT http://opensource.org/licenses/MIT
 */

namespace FFQP\Row\Data;

use \FFQP\Row\Data\DataAbstract as DataAbstract;

/**
 * A representation of what can be extracted from a row
 */
class RawData extends DataAbstract
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
}
