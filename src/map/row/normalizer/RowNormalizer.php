<?php

namespace FFQP\Map\Row;

use FFQP\Map\MapAbstract;
use FFQP\Model\QuotationInterface;
use FFQP\Model\Quotation;

/**
 * Allows to normalize all fields of a single row.
 */
class RowNormalizer implements RowNormalizerInterface
{
    /**
     * @type string
     */
    private $_format;

    /**
     * @type RowFieldNormalizerFactory
     */
    private $_rowFieldNormalizerFactory;

    /**
     * @param string $format
     * @param RowFieldNormalizerFactory $rowFieldNormalizerFactory
     */
    public function __construct(string $format, RowFieldNormalizerFactory $rowFieldNormalizerFactory)
    {
        $this->_format = $format;
        $this->_rowFieldNormalizerFactory = $rowFieldNormalizerFactory;
    }

    /**
     * @inheritdoc
     */
    public function normalize(Row $row): QuotationInterface
    {
        return new Quotation(
          $this->_rowFieldNormalizerFactory::create(MapAbstract::CODE)
            ->normalize($row->code, $row, $this->_format),
          $this->_rowFieldNormalizerFactory::create(MapAbstract::PLAYER)
            ->normalize($row->player, $row, $this->_format),
          $this->_rowFieldNormalizerFactory::create(MapAbstract::TEAM)
            ->normalize($row->team, $row, $this->_format),
          $this->_rowFieldNormalizerFactory::create(MapAbstract::ROLE)
            ->normalize($row->role, $row, $this->_format),
          $this->_rowFieldNormalizerFactory::create(MapAbstract::SECONDARY_ROLE)
            ->normalize($row->secondaryRole, $row, $this->_format),
          $this->_rowFieldNormalizerFactory::create(MapAbstract::ACTIVE)
            ->normalize($row->status, $row, $this->_format),
          $this->_rowFieldNormalizerFactory::create(MapAbstract::QUOTATION)
            ->normalize($row->quotation, $row, $this->_format),
          $this->_rowFieldNormalizerFactory::create(MapAbstract::MAGIC_POINTS)
            ->normalize($row->magicPoints, $row, $this->_format),
          $this->_rowFieldNormalizerFactory::create(MapAbstract::VOTE)
            ->normalize($row->vote, $row, $this->_format),
          $this->_rowFieldNormalizerFactory::create(MapAbstract::GOALS)
            ->normalize($row->goals, $row, $this->_format),
          $this->_rowFieldNormalizerFactory::create(MapAbstract::YELLOW_CARDS)
            ->normalize($row->yellowCards, $row, $this->_format),
          $this->_rowFieldNormalizerFactory::create(MapAbstract::RED_CARDS)
            ->normalize($row->redCards, $row, $this->_format),
          $this->_rowFieldNormalizerFactory::create(MapAbstract::PENALTIES)
            ->normalize($row->penalties, $row, $this->_format),
          $this->_rowFieldNormalizerFactory::create(MapAbstract::AUTO_GOALS)
            ->normalize($row->autoGoals, $row, $this->_format),
          $this->_rowFieldNormalizerFactory::create(MapAbstract::ASSISTS)
            ->normalize($row->assists, $row, $this->_format)
        );
    }
}
