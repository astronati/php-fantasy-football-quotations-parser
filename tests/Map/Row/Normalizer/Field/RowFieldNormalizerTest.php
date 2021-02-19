<?php

namespace Tests\Map\Row\Normalizer\Field;

use FFQP\Exception\NotFoundFieldException;
use FFQP\Map\MapAbstract;
use FFQP\Map\Row\Normalizer\Field\RowFieldNormalizerFactory;
use FFQP\Map\Row\Normalizer\Field\Type\ActiveNormalizer;
use FFQP\Map\Row\Normalizer\Field\Type\AssistsNormalizer;
use FFQP\Map\Row\Normalizer\Field\Type\AutoGoalsNormalizer;
use FFQP\Map\Row\Normalizer\Field\Type\CodeNormalizer;
use FFQP\Map\Row\Normalizer\Field\Type\GoalsNormalizer;
use FFQP\Map\Row\Normalizer\Field\Type\MagicPointsNormalizer;
use FFQP\Map\Row\Normalizer\Field\Type\PenaltiesNormalizer;
use FFQP\Map\Row\Normalizer\Field\Type\PlayerNormalizer;
use FFQP\Map\Row\Normalizer\Field\Type\QuotationNormalizer;
use FFQP\Map\Row\Normalizer\Field\Type\RedCardsNormalizer;
use FFQP\Map\Row\Normalizer\Field\Type\RoleNormalizer;
use FFQP\Map\Row\Normalizer\Field\Type\SecondaryRoleNormalizer;
use FFQP\Map\Row\Normalizer\Field\Type\TeamNormalizer;
use FFQP\Map\Row\Normalizer\Field\Type\VoteNormalizer;
use FFQP\Map\Row\Normalizer\Field\Type\YellowCardsNormalizer;
use PHPUnit\Framework\TestCase;

class RowFieldNormalizerTest extends TestCase
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
        $this->expectException(NotFoundFieldException::class);
        RowFieldNormalizerFactory::create('any_type');
    }
}
