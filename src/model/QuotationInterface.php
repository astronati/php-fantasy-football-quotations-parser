<?php

namespace FFQP\Model;

/**
 * A quotation is a values set that is assigned per each footballer after each match day (championship or cup).
 */
interface QuotationInterface
{

    /**
     * Returns the identifier of the footballer for the newspaper.
     * @return string
     */
    public function getCode(): string;

    /**
     * Returns the full name of the footballer.
     * @return string
     */
    public function getPlayer(): string;

    /**
     * Returns the name of the footballer team.
     * @return string
     */
    public function getTeam(): string;

    /**
     * Returns the role of the footballer.
     * It is a char (1) such as: 'P' (Goalkeeper), 'D' (Defender), 'C' (Midfielder), 'T' (Playmaker) or 'A'
     * (Forward).
     * @return string
     */
    public function getRole(): string;

    /**
     * Returns the secondary role of the footballer. This is available from the season 2015/16.
     * @see getRole
     * @return string
     */
    public function getSecondaryRole(): string;

    /**
     * Determines whether the footballer is no longer active for the current league.
     * @return boolean
     */
    public function isActive(): bool;

    /**
     * Returns the market value of the footballer. The value is expressed in Fantasy Millions (FMln).
     * @return int
     */
    public function getQuotation(): int;

    /**
     * Returns the Magic Points assigned to the footballer.
     * The step is of 0.5 so you can find values such as 5, 5.5, 6,...
     * @return float
     */
    public function getMagicPoints(): float;

    /**
     * Returns the vote on report card of the footballer.
     * The step is of 0.5 so you can find values such as 5, 5.5, 6,...
     * @return float
     */
    public function getVote(): ?float;

    /**
     * Determines if the footballer has played or not.
     * @return bool
     */
    public function hasPlayed(): bool;

    /**
     * Determines if the footballer has been marked as S.V. (without vote) by the newspaper.
     * @return bool
     */
    public function isWithoutVote(): bool;

    /**
     * Returns the number of goals scored or conceded by the footballer.
     * @return int
     */
    public function getGoals(): int;

    /**
     * Determines whether the footballer is cautioned or not.
     * @return boolean
     */
    public function isCautioned(): bool;

    /**
     * Determines whether the footbaler is sent off or not.
     * @return boolean
     */
    public function isSentOff(): bool;

    /**
     * Returns the number of penalties:
     * It's a bonus if the footballer is a goalkeeper: it means that he saved one or more penalties.
     * It's a malus if the footballer missed one or more penalties.
     * @return int
     */
    public function getPenalties(): int;

    /**
     * Returns the number of autogoals, footballer did.
     * @return int
     */
    public function getAutoGoals(): int;

    /**
     * Returns the number of assists performed by footballer.
     * @return int
     */
    public function getAssists(): int;
}
