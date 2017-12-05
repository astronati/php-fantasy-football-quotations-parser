<?php

/**
 * @author Andrea Stronati <stronati.a@gmail.com>
 * @license MIT http://opensource.org/licenses/MIT
 */

namespace FFQP\Row;

use \FFQP\Row\Cell\CellNormalizerFactory;
use \FFQP\Row\Data\RowData;
use \FFQP\Row\Data\PlayerData;
use \FFQP\Row\Map\RowDataExtractorAbstract;

/**
 * Allows to normalize each cell of a single row.
 */
class RowDataNormalizer implements RowDataNormalizerInterface
{
    /**
     * @type CellNormalizerFactory
     */
    private $_cellNormalizerFactory;

    /**
     * @param CellNormalizerFactory $cellNormalizerFactory
     */
    public function __construct(CellNormalizerFactory $cellNormalizerFactory)
    {
        $this->_cellNormalizerFactory = $cellNormalizerFactory;
    }

    /**
     * @inheritdoc
     */
    public function normalize(RowData $rowData, string $format): PlayerData
    {
        $playerData = new PlayerData(
            $this->_cellNormalizerFactory->create(RowDataExtractorAbstract::CODE)
                ->normalize($rowData->code, $rowData, $format),
            $this->_cellNormalizerFactory->create(RowDataExtractorAbstract::PLAYER)
                ->normalize($rowData->player, $rowData, $format),
            $this->_cellNormalizerFactory->create(RowDataExtractorAbstract::TEAM)
                ->normalize($rowData->team, $rowData, $format),
            $this->_cellNormalizerFactory->create(RowDataExtractorAbstract::ROLE)
                ->normalize($rowData->role, $rowData, $format),
            $this->_cellNormalizerFactory->create(RowDataExtractorAbstract::SECONDARY_ROLE)
                ->normalize($rowData->secondaryRole, $rowData, $format),
            $this->_cellNormalizerFactory->create(RowDataExtractorAbstract::ACTIVE)
                ->normalize($rowData->status, $rowData, $format),
            $this->_cellNormalizerFactory->create(RowDataExtractorAbstract::QUOTATION)
                ->normalize($rowData->quotation, $rowData, $format),
            $this->_cellNormalizerFactory->create(RowDataExtractorAbstract::MAGIC_POINTS)
                ->normalize($rowData->magicPoints, $rowData, $format),
            $this->_cellNormalizerFactory->create(RowDataExtractorAbstract::VOTE)
                ->normalize($rowData->vote, $rowData, $format),
            $this->_cellNormalizerFactory->create(RowDataExtractorAbstract::GOALS)
                ->normalize($rowData->goals, $rowData, $format),
            $this->_cellNormalizerFactory->create(RowDataExtractorAbstract::YELLOW_CARDS)
                ->normalize($rowData->yellowCards, $rowData, $format),
            $this->_cellNormalizerFactory->create(RowDataExtractorAbstract::RED_CARDS)
                ->normalize($rowData->redCards, $rowData, $format),
            $this->_cellNormalizerFactory->create(RowDataExtractorAbstract::PENALTIES)
                ->normalize($rowData->penalties, $rowData, $format),
            $this->_cellNormalizerFactory->create(RowDataExtractorAbstract::AUTOGOALS)
                ->normalize($rowData->autoGoals, $rowData, $format),
            $this->_cellNormalizerFactory->create(RowDataExtractorAbstract::ASSISTS)
                ->normalize($rowData->assists, $rowData, $format)
        );

        return $playerData;
    }
}
