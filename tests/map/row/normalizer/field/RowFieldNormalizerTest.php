<?php

use PHPUnit\Framework\TestCase;
use FFQP\Map\MapAbstract;
use FFQP\Map\Row\ActiveNormalizer;
use FFQP\Map\Row\AssistsNormalizer;
use FFQP\Map\Row\AutoGoalsNormalizer;
use FFQP\Map\Row\CodeNormalizer;
use FFQP\Map\Row\GoalsNormalizer;
use FFQP\Map\Row\MagicPointsNormalizer;
use FFQP\Map\Row\PenaltiesNormalizer;
use FFQP\Map\Row\PlayerNormalizer;
use FFQP\Map\Row\QuotationNormalizer;
use FFQP\Map\Row\RedCardsNormalizer;
use FFQP\Map\Row\RoleNormalizer;
use FFQP\Map\Row\SecondaryRoleNormalizer;
use FFQP\Map\Row\TeamNormalizer;
use FFQP\Map\Row\VoteNormalizer;
use FFQP\Map\Row\YellowCardsNormalizer;
use FFQP\Map\Row\RowFieldNormalizerFactory;

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
