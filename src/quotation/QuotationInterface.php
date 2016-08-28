<?php

/**
 * @author Andrea Stronati <astronati@vendini.com>
 * @license MIT http://opensource.org/licenses/MIT
 * @copyright 2015 Andrea Stronati
 * @version 0.2.0
 */

namespace FFQP {
  
  /**
   * A quotation is a values set that is assigned to each footballer after each championship or cup match.
   */
  interface QuotationInterface {
    
    /**
     * Returns the identifier of the footballer for the newspaper.
     *
     * @return integer
     */
    public function getCode();
    
    /**
     * Returns the full name or the last name of the footballer.
     *
     * @return string
     */
    public function getPlayer();
    
    /**
     * Returns the name of the footballer team.
     *
     * @return string
     */
    public function getTeam();
    
    /**
     * Returns the role of the footballer.
     * The role is a char (1) such as: 'P' (Goalkeeper), 'D' (Defender), 'C' (Midfielder), 'T' (Playmaker) or 'A' (Forward).
     *
     * @return string
     */
    public function getRole();
    
    /**
     * Returns the role of the footballer.
     * The role is a char (1) such as: 'P' (Goalkeeper), 'D' (Defender), 'C' (Midfielder) or 'A' (Forward).
     * NOTE The secondary role of the playmaker can be just Midfielder or Forward.
     *
     * @return string
     */
    public function getSecondaryRole();
    
    /**
     * Returns the status of the footballer: 1 (one) or 0 (zero) if the footballer is no longer in the team.
     *
     * @return integer
     */
    public function getStatus();
    
    /**
     * Returns the market value of the footballer.
     * The value is expressed in Fantasy Millions (FMln).
     *
     * @return integer
     */
    public function getQuotation();
    
    /**
     * Returns the Magic Points assigned to the footballer.
     * The step is of 0.5 in order to find values such as 5, 5.5, 6,...
     *
     * @return float
     */
    public function getMagicPoints();
    
    /**
     * Returns the vote on report card of the footballer.
     * The step is of 0.5 in order to find values such as 5, 5.5, 6,...
     *
     * @return float
     */
    public function getVote();
    
    /**
     * Returns the goals bonus assigned to the footballer.
     *
     * @return integer
     */
    public function getGoals();
    
    /**
     * Returns the malus due to the caution to apply to the vote of the footballer.
     * It can be 0 or 0.5.
     *
     * @return float
     */
    public function getCautions();
    
    /**
     * Returns the malus due to the expulsion to apply to the vote of the footballer.
     * It can be 0 or 1.
     *
     * @return integer
     */
    public function getExpulsion();
    
    /**
     * Returns the malus/bonus due to the expulsion to apply to the vote of the footballer.
     * It's a bonus if the footballer is a goalkeeper: it means that he saved one or more penalties.
     * It's a malus if the footballer missed one ore more penalties.
     *
     * @return integer
     */
    public function getPenalties();
    
    /**
     * Returns the malus due to one or more autogoals, footballer did, to apply to the vote of the footballer himself.
     *
     * @return integer
     */
    public function getAutoGoals();
    
    /**
     * Returns the bonus due to one ore more assists to apply to the vote of the footballer.
     *
     * @return integer
     */
    public function getAssists();
    
    /**
     * Returns the quotation entity as an associative array.
     *
     * @param array $fields
     *
     * @return array
     */
    public function toArray(array $fields);
  }
  
}
