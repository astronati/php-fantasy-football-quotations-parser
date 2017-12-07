<?php

namespace FFQP\Parser;

use FFQP\Map\MapGazzettaSince2013;
use FFQP\Map\MapGazzettaSince2015;
use FFQP\Map\Row\RowFieldNormalizerFactory;
use FFQP\Map\Row\RowNormalizer;

/**
 * Returns a specific quotations parser from the given format
 */
class QuotationsParserFactory
{
    public const FORMAT_GAZZETTA_SINCE_2013 = 'FORMAT_GAZZETTA_SINCE_2013';
    public const FORMAT_GAZZETTA_SINCE_2015 = 'FORMAT_GAZZETTA_SINCE_2015';

    /**
     * @param string $format
     * @return QuotationsParser
     * @throws \Exception
     */
    public static function create(string $format): QuotationsParser
    {
        $map = null;
        switch ($format) {
            case self::FORMAT_GAZZETTA_SINCE_2013:
                $map = new MapGazzettaSince2013();
                break;
            case self::FORMAT_GAZZETTA_SINCE_2015:
                $map = new MapGazzettaSince2015();
                break;
            default:
                throw new \Exception('Invalid argument: ' . $format);
        }

        $normalizer = new RowNormalizer($format, new RowFieldNormalizerFactory());

        return new QuotationsParser($map, $normalizer);
    }
}
