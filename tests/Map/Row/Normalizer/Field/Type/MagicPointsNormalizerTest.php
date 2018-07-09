<?php

namespace Tests\Map\Row\Normalizer\Field\Type;

use FFQP\Map\Row\Normalizer\Field\Type\MagicPointsNormalizer;
use FFQP\Model\Quotation;
use FFQP\Parser\QuotationsParserFactory;
use PHPUnit\Framework\TestCase;

class MagicPointsNormalizerTest extends TestCase
{
    private function getVoteNormalizer($vote)
    {
        $instance = $this->getMockBuilder('FFQP\Map\Row\Normalizer\Field\Type\VoteNormalizer')
          ->disableOriginalConstructor()
          ->setMethods(['normalize'])
          ->getMock();
        $instance->method('normalize')->with($vote)->willReturn($vote);
        return $instance;
    }

    private function getStatusNormalizer($status)
    {
        $instance = $this->getMockBuilder('FFQP\Map\Row\Normalizer\Field\Type\ActiveNormalizer')
          ->disableOriginalConstructor()
          ->setMethods(['normalize'])
          ->getMock();
        $instance->method('normalize')->with($status)->willReturn($status);
        return $instance;
    }

    private function getAssistsMagicPointsNormalizer($assists)
    {
        $instance = $this->getMockBuilder('FFQP\Map\Row\Normalizer\Field\Type\AssistsMagicPointsNormalizer')
          ->disableOriginalConstructor()
          ->setMethods(['normalize'])
          ->getMock();
        $instance->method('normalize')->with($assists)->willReturn(1.0);
        return $instance;
    }

    private function getAutoGoalsMagicPointsNormalizer($autogGoals)
    {
        $instance = $this->getMockBuilder('FFQP\Map\Row\Normalizer\Field\Type\AutoGoalsMagicPointsNormalizer')
          ->disableOriginalConstructor()
          ->setMethods(['normalize'])
          ->getMock();
        $instance->method('normalize')->with($autogGoals)->willReturn(-2.0);
        return $instance;
    }

    private function getGoalsMagicPointsNormalizer($goals)
    {
        $instance = $this->getMockBuilder('FFQP\Map\Row\Normalizer\Field\Type\GoalsMagicPointsNormalizer')
          ->disableOriginalConstructor()
          ->setMethods(['normalize'])
          ->getMock();
        $instance->method('normalize')->with($goals)->willReturn(6.0);
        return $instance;
    }

    private function getPenaltiesMagicPointsNormalizer($penalties)
    {
        $instance = $this->getMockBuilder('FFQP\Map\Row\Normalizer\Field\Type\PenaltiesMagicPointsNormalizer')
          ->disableOriginalConstructor()
          ->setMethods(['normalize'])
          ->getMock();
        $instance->method('normalize')->with($penalties)->willReturn(3.0);
        return $instance;
    }

    private function getYellowCardsMagicPointsNormalizer($yellowCards)
    {
        $instance = $this->getMockBuilder('FFQP\Map\Row\Normalizer\Field\Type\YellowCardsMagicPointsNormalizer')
          ->disableOriginalConstructor()
          ->setMethods(['normalize'])
          ->getMock();
        $instance->method('normalize')->with($yellowCards)->willReturn(-0.5);
        return $instance;
    }

    private function getRedCardsMagicPointsNormalizer($redCards)
    {
        $instance = $this->getMockBuilder('FFQP\Map\Row\Normalizer\Field\Type\RedCardsMagicPointsNormalizer')
          ->disableOriginalConstructor()
          ->setMethods(['normalize'])
          ->getMock();
        $instance->method('normalize')->with($redCards)->willReturn(-1.0);
        return $instance;
    }

    private function getNormalizerFieldsContainerInstance(
      $value,
      $vote,
      $status,
      $assist,
      $autoGoals,
      $goals,
      $penalties,
      $yellowCards,
      $redCards
    )
    {
        $instance = $this->getMockBuilder('FFQP\Map\Row\Normalizer\Field\NormalizedFieldsContainer')
          ->disableOriginalConstructor()
          ->setMethods(['get'])
          ->getMock();

        $map = [
          [Quotation::VOTE, $this->getVoteNormalizer($vote)],
          [Quotation::ACTIVE, $this->getStatusNormalizer($status)],
          [Quotation::ASSISTS_MAGIC_POINTS, $this->getAssistsMagicPointsNormalizer($assist)],
          [Quotation::AUTO_GOALS_MAGIC_POINTS, $this->getAutoGoalsMagicPointsNormalizer($autoGoals)],
          [Quotation::GOALS_MAGIC_POINTS, $this->getGoalsMagicPointsNormalizer($goals)],
          [Quotation::PENALTIES_MAGIC_POINTS, $this->getPenaltiesMagicPointsNormalizer($penalties)],
          [Quotation::YELLOW_CARDS_MAGIC_POINTS, $this->getYellowCardsMagicPointsNormalizer($yellowCards)],
          [Quotation::RED_CARDS_MAGIC_POINTS, $this->getRedCardsMagicPointsNormalizer($redCards)],
        ];
        $instance->method('get')->willReturnMap($map);

        return $instance;
    }

    private function getRowDataInstance(
      $role,
      $vote,
      $active,
      $assist,
      $autoGoals,
      $goals,
      $penalties,
      $yellowCards,
      $redCards
    )
    {
        $instance = $this->getMockBuilder('FFQP\Map\Row\Row')->disableOriginalConstructor()->getMock();
        $instance->role = $role;
        $instance->status = $active;
        $instance->vote = $vote;
        $instance->assists = $assist;
        $instance->autoGoals = $autoGoals;
        $instance->goals = $goals;
        $instance->penalties = $penalties;
        $instance->yellowCards = $yellowCards;
        $instance->redCards = $redCards;
        return $instance;
    }

    public function dataProvider()
    {
        return [
          ['-', 'P', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2017, null, true, 0, 0, 0, 0, 0, 0, null],
          ['-', 'D', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_WORLD_CUP_2018, null, true, 0, 0, 0, 0, 0, 0, null],
          ['0', 'P', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2017, 1.0, true, 0, 0, 0, 0, 0, 0, 0.0],
          ['6', 'P', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2017, 1.0, true, 0, 0, 0, 0, 0, 0, 6.0],
          ['6', 'D', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_WORLD_CUP_2018, 1.0, true, 0, 0, 0, 0, 0, 0, 6.0],
          ['-', 'D', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_WORLD_CUP_2018, 1.0, false, 1, 1, 1, 1, 1, 1, 7.5],
        ];
    }

    /**
     * @dataProvider dataProvider
     * @param * $value
     * @param string $role
     * @param string $format
     * @param float|null $vote
     * @param bool $active
     * @param float $assist
     * @param float $autoGoals
     * @param float $goals
     * @param float $penalties
     * @param float $yellowCards
     * @param float $redCards
     * @param float $result
     */
    public function testNormalize(
      $value,
      $role,
      $format,
      $vote,
      $active,
      $assist,
      $autoGoals,
      $goals,
      $penalties,
      $yellowCards,
      $redCards,
      $result
    )
    {
        $normalizer = new MagicPointsNormalizer();
        $rowData = $this->getRowDataInstance(
          $role,
          $vote,
          $active,
          $assist,
          $autoGoals,
          $goals,
          $penalties,
          $yellowCards,
          $redCards
        );
        $normalizedValue = $normalizer->normalize(
          $value,
          $rowData,
          $format,
          $this->getNormalizerFieldsContainerInstance(
            $value,
            $vote,
            $active,
            $assist,
            $autoGoals,
            $goals,
            $penalties,
            $yellowCards,
            $redCards
          )
        );
        if ($result === null) {
            $this->assertInternalType('null', $normalizedValue);
            $this->assertNull($normalizedValue);
        }
        else {
            $this->assertInternalType('float', $normalizedValue);
            $this->assertSame($result, $normalizedValue);
        }
    }
}
