<?php

/**
 * @author Andrea Stronati <stronati.a@gmail.com>
 * @license MIT http://opensource.org/licenses/MIT
 */

namespace FFQP\Row\Data;

/**
 * Describes a generic Data.
 */
abstract class DataAbstract
{
    
    // Roles
    const GOALKEEPER = 'P';
    const DEFENDER = 'D';
    const MIDFIELDER = 'C';
    const PLAYMAKER = 'T';
    const FORWARD = 'A';
}
