<?php

namespace FFQP\Map;

/**
 * A map allows to extract the rows containing quotations. It knows where looking for information.
 */
interface MapInterface
{

    /**
     * Returns an array of Row instances
     * @param string $filePath
     * @return array An array of Row(s)
     * @see \FFQP\Map\Row\Row
     */
    public function extractRows(string $filePath): array;
}
