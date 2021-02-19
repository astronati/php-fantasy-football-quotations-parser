<?php

namespace FFQP\Map\Gazzetta;

use FFQP\Map\MapAbstract;

/**
 * Defines a Gazzetta xls from season 2014/2015
 */
class GazzettaMapSince2013 extends MapAbstract
{
    public static function getVersion(): int
    {
        return 1;
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
            self::SECONDARY_ROLE => 4,
            self::ACTIVE => 5,
            self::QUOTATION => 6,
            self::MAGIC_POINTS => 7,
            self::VOTE => 8,
            self::GOALS => 9,
            self::YELLOW_CARDS => 10,
            self::RED_CARDS => 11,
            self::PENALTIES => 12,
            self::AUTO_GOALS => 13,
            self::ASSISTS => 14,
        ];
    }
}
