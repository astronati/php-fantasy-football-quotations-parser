<?php

/**
 * @author Andrea Stronati <stronati.a@gmail.com>
 * @license MIT http://opensource.org/licenses/MIT
 */

namespace FFQP\Row\Data;

use \FFQP\Row\Data\RawData as RawData;

/**
 * @codeCoverageIgnore
 */
class RawDataFactory
{
    /**
     * Returns an instance of RawData
     * @return RawData
     */
    public function create(): RawData
    {
        return new RawData();
    }
}
