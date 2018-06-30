<?php

namespace FFQP\Map\Row\Normalizer;

use FFQP\Map\Row\Normalizer\Field\NormalizedFieldsContainer;
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
        $normalizedFieldsContainer = new NormalizedFieldsContainer();
        $normalizedFieldsContainer
          ->add(Quotation::CODE, $this->factory::create(Quotation::CODE)->normalize($row->code, $row, $this->format))
          ->add(Quotation::PLAYER, $this->factory::create(Quotation::PLAYER)->normalize($row->player, $row, $this->format))
          ->add(Quotation::TEAM, $this->factory::create(Quotation::TEAM)->normalize($row->team, $row, $this->format))
          ->add(Quotation::ROLE, $this->factory::create(Quotation::ROLE)->normalize($row->role, $row, $this->format))
          ->add(Quotation::SECONDARY_ROLE, $this->factory::create(Quotation::SECONDARY_ROLE)->normalize($row->secondaryRole, $row, $this->format))
          ->add(Quotation::ACTIVE, $this->factory::create(Quotation::ACTIVE)->normalize($row->status, $row, $this->format))
          ->add(Quotation::QUOTATION, $this->factory::create(Quotation::QUOTATION)->normalize($row->quotation, $row, $this->format))
          ->add(Quotation::MAGIC_POINTS, $this->factory::create(Quotation::MAGIC_POINTS)->normalize($row->magicPoints, $row, $this->format))
          ->add(Quotation::VOTE, $this->factory::create(Quotation::VOTE)->normalize($row->vote, $row, $this->format))
          ->add(Quotation::GOALS, $this->factory::create(Quotation::GOALS)->normalize($row->goals, $row, $this->format))
          ->add(Quotation::YELLOW_CARDS, $this->factory::create(Quotation::YELLOW_CARDS)->normalize($row->yellowCards, $row, $this->format))
          ->add(Quotation::RED_CARDS, $this->factory::create(Quotation::RED_CARDS)->normalize($row->redCards, $row, $this->format))
          ->add(Quotation::PENALTIES, $this->factory::create(Quotation::PENALTIES)->normalize($row->penalties, $row, $this->format))
          ->add(Quotation::AUTO_GOALS, $this->factory::create(Quotation::AUTO_GOALS)->normalize($row->autoGoals, $row, $this->format))
          ->add(Quotation::ASSISTS, $this->factory::create(Quotation::ASSISTS)->normalize($row->assists, $row, $this->format))
        ;

        return new Quotation(
          $normalizedFieldsContainer->get(Quotation::CODE),
          $normalizedFieldsContainer->get(Quotation::PLAYER),
          $normalizedFieldsContainer->get(Quotation::TEAM),
          $normalizedFieldsContainer->get(Quotation::ROLE),
          $normalizedFieldsContainer->get(Quotation::SECONDARY_ROLE),
          $normalizedFieldsContainer->get(Quotation::ACTIVE),
          $normalizedFieldsContainer->get(Quotation::QUOTATION),
          $normalizedFieldsContainer->get(Quotation::MAGIC_POINTS),
          $this->factory::create(Quotation::ORIGINAL_MAGIC_POINTS)->normalize($row->assists, $row, $this->format, $normalizedFieldsContainer),
          $normalizedFieldsContainer->get(Quotation::VOTE),
          $normalizedFieldsContainer->get(Quotation::GOALS),
          $normalizedFieldsContainer->get(Quotation::YELLOW_CARDS),
          $normalizedFieldsContainer->get(Quotation::RED_CARDS),
          $normalizedFieldsContainer->get(Quotation::PENALTIES),
          $normalizedFieldsContainer->get(Quotation::AUTO_GOALS),
          $normalizedFieldsContainer->get(Quotation::ASSISTS)
        );
    }
}
