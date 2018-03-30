<?php

namespace FFQP\Map\Row\Normalizer;

use FFQP\Map\Row\Row;
use FFQP\Map\Row\Normalizer\Field\RowFieldNormalizerFactory;
use FFQP\Model\Quotation;

/**
 * Allows to normalize all fields of a single row.
 */
class RowNormalizer implements RowNormalizerInterface
{
    /**
     * @type string
     */
    private $format;

    /**
     * @type RowFieldNormalizerFactory
     */
    private $factory;

    /**
     * @param string $format
     * @param RowFieldNormalizerFactory $rowFieldNormalizerFactory
     */
    public function __construct(string $format, RowFieldNormalizerFactory $rowFieldNormalizerFactory)
    {
        $this->format = $format;
        $this->factory = $rowFieldNormalizerFactory;
    }

    /**
     * @inheritdoc
     */
    public function normalize(Row $row): Quotation
    {
        return new Quotation(
          $this->factory::create(Quotation::CODE)->normalize($row->code, $row, $this->format),
          $this->factory::create(Quotation::PLAYER)->normalize($row->player, $row, $this->format),
          $this->factory::create(Quotation::TEAM)->normalize($row->team, $row, $this->format),
          $this->factory::create(Quotation::ROLE)->normalize($row->role, $row, $this->format),
          $this->factory::create(Quotation::SECONDARY_ROLE)->normalize($row->secondaryRole, $row, $this->format),
          $this->factory::create(Quotation::ACTIVE)->normalize($row->status, $row, $this->format),
          $this->factory::create(Quotation::QUOTATION)->normalize($row->quotation, $row, $this->format),
          $this->factory::create(Quotation::MAGIC_POINTS)->normalize($row->magicPoints, $row, $this->format),
          $this->factory::create(Quotation::ORIGINAL_MAGIC_POINTS)->normalize(
            $row->magicPoints, $row, $this->format,
            [
              'magicPoints' => $this->factory::create(Quotation::MAGIC_POINTS)
                ->normalize($row->magicPoints, $row, $this->format),
              'goals' => $this->factory::create(Quotation::GOALS)
                ->normalize($row->goals, $row, $this->format),
            ]
          ),
          $this->factory::create(Quotation::VOTE)->normalize($row->vote, $row, $this->format),
          $this->factory::create(Quotation::GOALS)->normalize($row->goals, $row, $this->format),
          $this->factory::create(Quotation::YELLOW_CARDS)->normalize($row->yellowCards, $row, $this->format),
          $this->factory::create(Quotation::RED_CARDS)->normalize($row->redCards, $row, $this->format),
          $this->factory::create(Quotation::PENALTIES)->normalize($row->penalties, $row, $this->format),
          $this->factory::create(Quotation::AUTO_GOALS)->normalize($row->autoGoals, $row, $this->format),
          $this->factory::create(Quotation::ASSISTS)->normalize($row->assists, $row, $this->format)
        );
    }
}
