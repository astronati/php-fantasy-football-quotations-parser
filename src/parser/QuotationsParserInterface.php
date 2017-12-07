<?php

namespace FFQP\Parser;

/**
 * A tool to read a spreadsheet in order to return data per each footballer.
 */
interface QuotationsParserInterface
{
    /**
     * Given a $filePath, it parses and returns an array of Quotation(s)
     * @param string $filePath
     * @return \FFQP\Model\QuotationInterface[] An array of Quotation instances.
     */
    public function getQuotations(string $filePath): array;
}
