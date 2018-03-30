<?php

namespace FFQP\Parser;

use FFQP\Map\Gazzetta\GazzettaMapSince2013;
use FFQP\Map\Gazzetta\GazzettaMapSince2015;
use FFQP\Map\Gazzetta\GazzettaMapSince2017;
use FFQP\Map\Row\Normalizer\Field\RowFieldNormalizerFactory;
use FFQP\Map\Row\Normalizer\RowNormalizer;

/**
 * Returns a specific quotations parser from the given format
 */
class QuotationsParserFactory
{
    public const FORMAT_GAZZETTA_SINCE_2013 = 'FORMAT_GAZZETTA_SINCE_2013';
    public const FORMAT_GAZZETTA_SINCE_2015 = 'FORMAT_GAZZETTA_SINCE_2015';
    public const FORMAT_GAZZETTA_SINCE_2017 = 'FORMAT_GAZZETTA_SINCE_2017';

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
                $map = new GazzettaMapSince2013();
                break;
            case self::FORMAT_GAZZETTA_SINCE_2015:
                $map = new GazzettaMapSince2015();
                break;
            case self::FORMAT_GAZZETTA_SINCE_2017:
                $map = new GazzettaMapSince2017();
                break;
            default:
                throw new \Exception('Invalid argument: ' . $format);
        }

        $normalizer = new RowNormalizer($format, new RowFieldNormalizerFactory());

        return new QuotationsParser($map, $normalizer);
    }
}