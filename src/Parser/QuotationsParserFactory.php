<?php

namespace FFQP\Parser;

use FFQP\Exception\InvalidFormatException;
use FFQP\Map\Gazzetta\GazzettaMapSince2013;
use FFQP\Map\Gazzetta\GazzettaMapSince2015;
use FFQP\Map\Gazzetta\GazzettaMapSince2017;
use FFQP\Map\Gazzetta\GazzettaMapSince2019;
use FFQP\Map\Gazzetta\GazzettaMapSinceWorldCup2018;
use FFQP\Map\MapAbstract;
use FFQP\Map\Row\Normalizer\Field\RowFieldNormalizerFactory;
use FFQP\Map\Row\Normalizer\RowNormalizer;

/**
 * Returns a specific quotations parser from the given format
 */
class QuotationsParserFactory
{
    /**
     * @param string $gazzettaMapClassName
     * @return QuotationsParser
     * @throws InvalidFormatException
     */
    public static function create(string $gazzettaMapClassName): QuotationsParser
    {
        if (!in_array($gazzettaMapClassName, [
            GazzettaMapSince2013::class,
            GazzettaMapSince2015::class,
            GazzettaMapSince2017::class,
            GazzettaMapSinceWorldCup2018::class,
            GazzettaMapSince2019::class,
        ])) {
            throw new InvalidFormatException('Invalid argument: ' . $gazzettaMapClassName);
        }

        /** @var MapAbstract $map */
        $map = new $gazzettaMapClassName();
        $normalizer = new RowNormalizer($map::getVersion(), new RowFieldNormalizerFactory());

        return new QuotationsParser($map, $normalizer);
    }
}
