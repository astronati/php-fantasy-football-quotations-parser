<?php

namespace FFQP\Parser;

use FFQP\Model\Quotation;

/**
 * A tool to read a spreadsheet in order to return data per each footballer.
 */
interface QuotationsParserInterface
{
    /**
     * Given a $filePath, it parses and returns an array of Quotation(s)
     * @param string $filePath
     * @return Quotation[]
     */
    public function getQuotations(string $filePath): array;
}
