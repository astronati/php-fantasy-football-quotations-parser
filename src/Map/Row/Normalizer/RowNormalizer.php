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
          ->add(Quotation::CODE, $this->factory::create(Quotation::CODE))
          ->add(Quotation::PLAYER, $this->factory::create(Quotation::PLAYER))
          ->add(Quotation::TEAM, $this->factory::create(Quotation::TEAM))
          ->add(Quotation::ROLE, $this->factory::create(Quotation::ROLE))
          ->add(Quotation::SECONDARY_ROLE, $this->factory::create(Quotation::SECONDARY_ROLE))
          ->add(Quotation::ACTIVE, $this->factory::create(Quotation::ACTIVE))
          ->add(Quotation::QUOTATION, $this->factory::create(Quotation::QUOTATION))
          ->add(Quotation::ORIGINAL_MAGIC_POINTS, $this->factory::create(Quotation::ORIGINAL_MAGIC_POINTS))
          ->add(Quotation::MAGIC_POINTS, $this->factory::create(Quotation::MAGIC_POINTS))
          ->add(Quotation::VOTE, $this->factory::create(Quotation::VOTE))
          ->add(Quotation::GOALS_MAGIC_POINTS, $this->factory::create(Quotation::GOALS_MAGIC_POINTS))
          ->add(Quotation::GOALS, $this->factory::create(Quotation::GOALS))
          ->add(Quotation::YELLOW_CARDS_MAGIC_POINTS, $this->factory::create(Quotation::YELLOW_CARDS_MAGIC_POINTS))
          ->add(Quotation::YELLOW_CARDS, $this->factory::create(Quotation::YELLOW_CARDS))
          ->add(Quotation::RED_CARDS_MAGIC_POINTS, $this->factory::create(Quotation::RED_CARDS_MAGIC_POINTS))
          ->add(Quotation::RED_CARDS, $this->factory::create(Quotation::RED_CARDS))
          ->add(Quotation::PENALTIES_MAGIC_POINTS, $this->factory::create(Quotation::PENALTIES_MAGIC_POINTS))
          ->add(Quotation::PENALTIES, $this->factory::create(Quotation::PENALTIES))
          ->add(Quotation::AUTO_GOALS_MAGIC_POINTS, $this->factory::create(Quotation::AUTO_GOALS_MAGIC_POINTS))
          ->add(Quotation::AUTO_GOALS, $this->factory::create(Quotation::AUTO_GOALS))
          ->add(Quotation::ASSISTS_MAGIC_POINTS, $this->factory::create(Quotation::ASSISTS_MAGIC_POINTS))
          ->add(Quotation::ASSISTS, $this->factory::create(Quotation::ASSISTS))
        ;

        return new Quotation(
          $normalizedFieldsContainer->get(Quotation::CODE)
            ->normalize($row->code, $row, $this->format, $normalizedFieldsContainer),
          $normalizedFieldsContainer->get(Quotation::PLAYER)
            ->normalize($row->player, $row, $this->format, $normalizedFieldsContainer),
          $normalizedFieldsContainer->get(Quotation::TEAM)
            ->normalize($row->team, $row, $this->format, $normalizedFieldsContainer),
          $normalizedFieldsContainer->get(Quotation::ROLE)
            ->normalize($row->role, $row, $this->format, $normalizedFieldsContainer),
          $normalizedFieldsContainer->get(Quotation::SECONDARY_ROLE)
            ->normalize($row->secondaryRole, $row, $this->format, $normalizedFieldsContainer),
          $normalizedFieldsContainer->get(Quotation::ACTIVE)
            ->normalize($row->status, $row, $this->format, $normalizedFieldsContainer),
          $normalizedFieldsContainer->get(Quotation::QUOTATION)
            ->normalize($row->quotation, $row, $this->format, $normalizedFieldsContainer),
          $normalizedFieldsContainer->get(Quotation::MAGIC_POINTS)
            ->normalize($row->magicPoints, $row, $this->format, $normalizedFieldsContainer),
          $normalizedFieldsContainer->get(Quotation::ORIGINAL_MAGIC_POINTS)
            ->normalize($row->magicPoints, $row, $this->format, $normalizedFieldsContainer),
          $normalizedFieldsContainer->get(Quotation::VOTE)
            ->normalize($row->vote, $row, $this->format, $normalizedFieldsContainer),
          $normalizedFieldsContainer->get(Quotation::GOALS_MAGIC_POINTS)
            ->normalize($row->goals, $row, $this->format, $normalizedFieldsContainer),
          $normalizedFieldsContainer->get(Quotation::GOALS)
            ->normalize($row->goals, $row, $this->format, $normalizedFieldsContainer),
          $normalizedFieldsContainer->get(Quotation::YELLOW_CARDS_MAGIC_POINTS)
            ->normalize($row->yellowCards, $row, $this->format, $normalizedFieldsContainer),
          $normalizedFieldsContainer->get(Quotation::YELLOW_CARDS)
            ->normalize($row->yellowCards, $row, $this->format, $normalizedFieldsContainer),
          $normalizedFieldsContainer->get(Quotation::RED_CARDS_MAGIC_POINTS)
            ->normalize($row->redCards, $row, $this->format, $normalizedFieldsContainer),
          $normalizedFieldsContainer->get(Quotation::RED_CARDS)
            ->normalize($row->redCards, $row, $this->format, $normalizedFieldsContainer),
          $normalizedFieldsContainer->get(Quotation::PENALTIES_MAGIC_POINTS)
            ->normalize($row->penalties, $row, $this->format, $normalizedFieldsContainer),
          $normalizedFieldsContainer->get(Quotation::PENALTIES)
            ->normalize($row->penalties, $row, $this->format, $normalizedFieldsContainer),
          $normalizedFieldsContainer->get(Quotation::AUTO_GOALS_MAGIC_POINTS)
            ->normalize($row->autoGoals, $row, $this->format, $normalizedFieldsContainer),
          $normalizedFieldsContainer->get(Quotation::AUTO_GOALS)
            ->normalize($row->autoGoals, $row, $this->format, $normalizedFieldsContainer),
          $normalizedFieldsContainer->get(Quotation::ASSISTS_MAGIC_POINTS)
            ->normalize($row->assists, $row, $this->format, $normalizedFieldsContainer),
          $normalizedFieldsContainer->get(Quotation::ASSISTS)
            ->normalize($row->assists, $row, $this->format, $normalizedFieldsContainer)
        );
    }
}
