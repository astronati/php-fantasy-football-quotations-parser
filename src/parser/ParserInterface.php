<?php

/**
 * @author Andrea Stronati <stronati.a@gmail.com>
 * @license MIT http://opensource.org/licenses/MIT
 */

namespace FFQP\Parser {
    
    use FFQP\Row\Data\Data;
    use FFQP\Row\Data\RawData;
    
    /**
     * A tool to read a spreadsheet in order to return data per each footballer.
     */
    interface ParserInterface
    {
        
        /**
         * Extracts the normalized data of the footballers.
         * @return Data[] An array of Data instances.
         */
        public function getData(): array;
        
        /**
         * Extracts the raw data of the footballers.
         * @return RawData[] An array of RawData instances.
         */
        public function getRawData(): array;
    }
    
}
