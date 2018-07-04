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
     * Returns the secondary (original) role of the footballer. This is available from the season 2015/16.
     * The difference with 'getRole' is that a 'T' role has own corresponding 'C' or 'A'.
     * @see getRole
     * @return string
     */
    public function getSecondaryRole(): string;

    /**
     * Determines whether the footballer is no longer active for the current league or better whether the footballer is
     * still playing in the Serie A.
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
     * This value includes bonus and malus calculated with the rules of the own season.
     * @return float|null
     */
    public function getMagicPoints(): ?float;

    /**
     * Returns the Magic Points assigned to the footballer.
     * The step is of 0.5 so you can find values such as 5, 5.5, 6,...
     * This value includes bonus and malus calculated with the classic rules.
     * @return float|null
     */
    public function getOriginalMagicPoints(): ?float;

    /**
     * Returns the vote on report card of the footballer.
     * The step is of 0.5 so you can find values such as 5, 5.5, 6,...
     * @return float|null
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
     * Returns the magic points associated to the goals scored or conceded by the footballer.
     * @return float
     */
    public function getGoalsMagicPoints(): float;

    /**
     * Returns the number of goals scored or conceded by the footballer.
     * @return int
     */
    public function getGoals(): int;

    /**
     * Returns the magic points associated to the yellow card.
     * @return float
     */
    public function getYellowCardMagicPoints(): float;

    /**
     * Determines whether the footballer is cautioned or not.
     * @return boolean
     */
    public function isCautioned(): bool;

    /**
     * Returns the magic points associated to the red card.
     * @return float
     */
    public function getRedCardMagicPoints(): float;

    /**
     * Determines whether the footbaler is sent off or not.
     * @return boolean
     */
    public function isSentOff(): bool;

    /**
     * Returns the magic points associated to number of penalties.
     * @return float
     */
    public function getPenaltiesMagicPoints(): float;

    /**
     * Returns the number of penalties:
     * It's a bonus if the footballer is a goalkeeper: it means that he saved one or more penalties.
     * It's a malus if the footballer missed one or more penalties.
     * @return int
     */
    public function getPenalties(): int;

    /**
     * Returns the magic points associated to number of auto goals.
     * @return float
     */
    public function getAutoGoalsMagicPoints(): float;

    /**
     * Returns the number of auto goals, footballer did.
     * @return int
     */
    public function getAutoGoals(): int;

    /**
     * Returns the magic points associated to number of assists.
     * @return float
     */
    public function getAssistsMagicPoints(): float;

    /**
     * Returns the number of assists performed by footballer.
     * @return int
     */
    public function getAssists(): int;
}
