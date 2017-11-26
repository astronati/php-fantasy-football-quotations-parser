<?php

/**
 * @author Andrea Stronati <stronati.a@gmail.com>
 * @license MIT http://opensource.org/licenses/MIT
 */

namespace FFQP\Row\Map {
    
    /**
     * Describes a Map interface. A map allows to know which column is associated to a given field (e.g. code, name,...)
     */
    interface RowMapInterface
    {
        
        /**
         * Returns the column number of the given field
         * @param string $field
         * @return int
         */
        public function getOffset($field): int;
        
        /**
         * Returns the list of all available fields
         * @return array
         */
        public function getFields(): array;
    }
    
}
