<?php

namespace FFQP\Map\Gazzetta;

use FFQP\Map\MapAbstract;

/**
 * Defines a Gazzetta xls from World Cup 2018
 */
class GazzettaMapSinceWorldCup2018 extends MapAbstract
{
    public static function getVersion(): int
    {
        return 4;
    }

    /**
     * @inheritdoc
     * @see MapAbstract::getColumnIndexByFieldNameMap()
     */
    protected function getColumnIndexByFieldNameMap(): array
    {
        return [
            self::CODE => 1,
            self::PLAYER => 2,
            self::TEAM => 3,
            self::ROLE => 4,
            self::SECONDARY_ROLE => 5,
            self::ACTIVE => 6,
            self::QUOTATION => 7,
            self::MAGIC_POINTS => 8,
            self::VOTE => 9,
            self::GOALS => 10,
            self::YELLOW_CARDS => 11,
            self::RED_CARDS => 12,
            self::PENALTIES => 13,
            self::AUTO_GOALS => 14,
            self::ASSISTS => 15,
        ];
    }
}
