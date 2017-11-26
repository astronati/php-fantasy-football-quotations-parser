<?php

/**
 * @author Andrea Stronati <stronati.a@gmail.com>
 * @license MIT http://opensource.org/licenses/MIT
 */

namespace FFQP\Row\Map;

use \FFQP\Row\Map\SeasonMap2013 as SeasonMap2013;
use \FFQP\Row\Map\SeasonMap2015 as SeasonMap2015;
use \FFQP\Row\Map\RowMapAbstract as RowMapAbstract;

/**
 * @codeCoverageIgnore
 */
class RowMapFactory
{
    /**
     * Returns an extension of RowMapAbstract
     * @param string $season
     * @return RowMapAbstract
     */
    public static function create($season = '2017'): RowMapAbstract
    {
        switch ($season) {
            case '2013':
            case '2014':
                return new SeasonMap2013();
            default:
                return new SeasonMap2015();
        }
    }
}
