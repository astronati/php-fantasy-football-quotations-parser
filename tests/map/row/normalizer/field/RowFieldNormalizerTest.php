<?php

use PHPUnit\Framework\TestCase;
use FFQP\Map\MapAbstract;
use FFQP\Map\Row\Normalizer\Field\ActiveNormalizer;
use FFQP\Map\Row\Normalizer\Field\AssistsNormalizer;
use FFQP\Map\Row\Normalizer\Field\AutoGoalsNormalizer;
use FFQP\Map\Row\Normalizer\Field\CodeNormalizer;
use FFQP\Map\Row\Normalizer\Field\GoalsNormalizer;
use FFQP\Map\Row\Normalizer\Field\MagicPointsNormalizer;
use FFQP\Map\Row\Normalizer\Field\PenaltiesNormalizer;
use FFQP\Map\Row\Normalizer\Field\PlayerNormalizer;
use FFQP\Map\Row\Normalizer\Field\QuotationNormalizer;
use FFQP\Map\Row\Normalizer\Field\RedCardsNormalizer;
use FFQP\Map\Row\Normalizer\Field\RoleNormalizer;
use FFQP\Map\Row\Normalizer\Field\SecondaryRoleNormalizer;
use FFQP\Map\Row\Normalizer\Field\TeamNormalizer;
use FFQP\Map\Row\Normalizer\Field\VoteNormalizer;
use FFQP\Map\Row\Normalizer\Field\YellowCardsNormalizer;
use FFQP\Map\Row\Normalizer\Field\RowFieldNormalizerFactory;

class RowFieldNormalizerFactoryTest extends TestCase
{
    public function dataProvider()
    {
        return [
          [MapAbstract::ACTIVE, ActiveNormalizer::class],
          [MapAbstract::ASSISTS, AssistsNormalizer::class],
          [MapAbstract::AUTO_GOALS, AutoGoalsNormalizer::class],
          [MapAbstract::CODE, CodeNormalizer::class],
          [MapAbstract::GOALS, GoalsNormalizer::class],
          [MapAbstract::MAGIC_POINTS, MagicPointsNormalizer::class],
          [MapAbstract::PENALTIES, PenaltiesNormalizer::class],
          [MapAbstract::PLAYER, PlayerNormalizer::class],
          [MapAbstract::QUOTATION, QuotationNormalizer::class],
          [MapAbstract::RED_CARDS, RedCardsNormalizer::class],
          [MapAbstract::ROLE, RoleNormalizer::class],
          [MapAbstract::SECONDARY_ROLE, SecondaryRoleNormalizer::class],
          [MapAbstract::TEAM, TeamNormalizer::class],
          [MapAbstract::VOTE, VoteNormalizer::class],
          [MapAbstract::YELLOW_CARDS, YellowCardsNormalizer::class],
        ];
    }

    /**
     * @dataProvider dataProvider
     * @param string $type
     * @param string $instanceType
     */
    public function testCreate($type, $instanceType)
    {
        $this->assertInstanceOf(
          $instanceType,
          RowFieldNormalizerFactory::create($type)
        );
    }

    public function testException()
    {
        $this->expectException(\Exception::class);
        RowFieldNormalizerFactory::create('any_type');
    }
}
