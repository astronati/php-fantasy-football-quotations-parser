<?php

namespace FFQP\Map;

/**
 * Defines a Gazzetta xls from season 2015/2016
 */
class MapGazzettaSince2015 extends MapAbstract
{
    /**
     * @inheritdoc
     * @see MapAbstract::getColumnIndexByFieldNameMap()
     */
    protected function getColumnIndexByFieldNameMap(): array
    {
        return [
          self::CODE => 0,
          self::PLAYER => 1,
          self::TEAM => 2,
          self::ROLE => 3,
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
