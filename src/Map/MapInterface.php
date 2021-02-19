<?php

namespace FFQP\Map;

use FFQP\Map\Row\Row;

/**
 * A map allows to extract the rows containing quotations. It knows where looking for information.
 */
interface MapInterface
{
    public static function getVersion(): int;

    /**
     * Returns an array of Row instances
     * @param string $filePath
     * @return Row[]
     */
    public function extractRows(string $filePath): array;
}
