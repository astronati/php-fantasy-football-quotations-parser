<?php

/**
 * @author Andrea Stronati <stronati.a@gmail.com>
 * @license MIT http://opensource.org/licenses/MIT
 */

namespace FFQP\Model;

use \FFQP\Model\QuotationInterface as QuotationInterface;
use \FFQP\Row\Data\Data as Data;

/**
 * A quotation is a values set that is assigned per each footballer after each match day (championship or cup).
 */
class Quotation implements QuotationInterface
{
    /**
     * A row map
     * @var Data
     */
    private $_data;
    
    /**
     * @param Data $data An instance of Data
     */
    public function __construct(Data $data)
    {
        $this->_data = $data;
    }
    
    /**
     * @inheritdoc
     * @see QuotationInterface::getCode()
     */
    public function getCode(): string
    {
        return $this->_data->code;
    }
    
    /**
     * @inheritdoc
     * @see QuotationInterface::getPlayer()
     */
    public function getPlayer(): string
    {
        return $this->_data->player;
    }
    
    /**
     * @inheritdoc
     * @see QuotationInterface::getTeam()
     */
    public function getTeam(): string
    {
        return $this->_data->team;
    }
    
    /**
     * @inheritdoc
     * @see QuotationInterface::getRole()
     */
    public function getRole(): string
    {
        return $this->_data->role;
    }
    
    /**
     * @inheritdoc
     * @see QuotationInterface::getSecondaryRole()
     */
    public function getSecondaryRole(): string
    {
        return $this->_data->secondaryRole;
    }
    
    /**
     * @inheritdoc
     * @see QuotationInterface::isActive()
     */
    public function isActive(): bool
    {
        return $this->_data->active === true;
    }
    
    /**
     * @inheritdoc
     * @see QuotationInterface::getQuotation()
     */
    public function getQuotation(): int
    {
        return $this->_data->quotation;
    }
    
    /**
     * @inheritdoc
     * @see QuotationInterface::getMagicPoints()
     */
    public function getMagicPoints(): float
    {
        return $this->_data->magicPoints;
    }
    
    /**
     * @inheritdoc
     * @see QuotationInterface::getVote()
     */
    public function getVote(): ?float
    {
        return $this->_data->vote;
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
        return $this->_data->goals;
    }
    
    /**
     * @inheritdoc
     * @see QuotationInterface::isCautioned
     */
    public function isCautioned(): bool
    {
        return $this->_data->yellowCards > 0;
    }
    
    /**
     * @inheritdoc
     * @see QuotationInterface::isSentOff()
     */
    public function isSentOff(): bool
    {
        return $this->_data->redCards > 0;
    }
    
    /**
     * @inheritdoc
     * @see QuotationInterface::getPenalties()
     */
    public function getPenalties(): int
    {
        return $this->_data->penalties;
    }
    
    /**
     * @inheritdoc
     * @see QuotationInterface::getAutoGoals()
     */
    public function getAutoGoals(): int
    {
        return $this->_data->autoGoals;
    }
    
    /**
     * @inheritdoc
     * @see QuotationInterface::getAssists()
     */
    public function getAssists(): int
    {
        return $this->_data->assists;
    }
}
