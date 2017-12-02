<?php

/**
 * @author Andrea Stronati <stronati.a@gmail.com>
 * @license MIT http://opensource.org/licenses/MIT
 */

namespace FFQP\Row\Data;

use FFQP\Parser\PlayerDataGenerator;
use FFQP\Row\Cell\CellNormalizerFactory;
use FFQP\Row\Map\RowDataExtractorGazzettaSince2013;
use FFQP\Row\Map\RowDataExtractorGazzettaSince2015;
use FFQP\Row\RowDataNormalizer;

/**
 * Factory for PlayerDataGenerator
 */
class PlayerDataGeneratorFactory
{
    public const FORMAT_GAZZETTA_SINCE_2013 = 'FORMAT_GAZZETTA_SINCE_2013';
    public const FORMAT_GAZZETTA_SINCE_2015 = 'FORMAT_GAZZETTA_SINCE_2015';

    /**
     * Factory for PlayerDataGenerator
     * @param string $format
     * @return PlayerDataGenerator
     * @throws \Exception
     */
    public static function create(string $format): PlayerDataGenerator
    {
        $normalizer = new RowDataNormalizer(new CellNormalizerFactory());
        $parser = null;
        switch ($format) {
            case self::FORMAT_GAZZETTA_SINCE_2013:
                $parser = new RowDataExtractorGazzettaSince2013();
                break;
            case self::FORMAT_GAZZETTA_SINCE_2015:
                $parser = new RowDataExtractorGazzettaSince2015();
                break;
            default:
                throw new \Exception('Invalid argument ' . $format);
        }

        return new PlayerDataGenerator($parser, $normalizer, $format);
    }
}
