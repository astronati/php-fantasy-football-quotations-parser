<?php

/**
 * @author Andrea Stronati <stronati.a@gmail.com>
 * @license MIT http://opensource.org/licenses/MIT
 */

namespace FFQP\Row\Cell {
    
    use \FFQP\Row\Data\RawData as RawData;
    
    /**
     * Allows to normalize values of a cell.
     */
    interface CellNormalizerInterface
    {
        
        /**
         * Returns the normalized value of a given field of a cell.
         * @param * $value
         * @param RawData $rawData
         * @param ?string $season
         * @return int|string|bool|float|null
         */
        public function normalize($value, RawData $rawData, $season = null);
    }
    
}
