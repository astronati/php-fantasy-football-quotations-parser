<?php

namespace Tests\Map\Row\Normalizer\Field\Type;

use FFQP\Map\Row\Normalizer\Field\Type\OriginalMagicPointsNormalizer;
use FFQP\Model\Quotation;
use PHPUnit\Framework\TestCase;

class OriginalMagicPointsNormalizerTest extends TestCase
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

    private function getGoalsNormalizer($value, $goals)
    {
        $instance = $this->getMockBuilder('FFQP\Map\Row\Normalizer\Field\Type\GoalsNormalizer')
          ->disableOriginalConstructor()
          ->setMethods(['normalize'])
          ->getMock();
        $instance->method('normalize')->with($value)->willReturn($goals);
        return $instance;
    }

    private function getMagicPointsNormalizer($value, $magicPoints)
    {
        $instance = $this->getMockBuilder('FFQP\Map\Row\Normalizer\Field\Type\MagicPointsNormalizer')
          ->disableOriginalConstructor()
          ->setMethods(['normalize'])
          ->getMock();
        $instance->method('normalize')->with($value)->willReturn($magicPoints);
        return $instance;
    }

    private function getNormalizerFieldsContainerInstance($value, $magicPoints, $goalsMagicPoints, $goals, $vote)
    {
        $instance = $this->getMockBuilder('FFQP\Map\Row\Normalizer\Field\NormalizedFieldsContainer')
          ->disableOriginalConstructor()
          ->setMethods(['get'])
          ->getMock();

        $map = [
            [Quotation::GOALS, $this->getGoalsNormalizer($goalsMagicPoints, $goals)],
            [Quotation::MAGIC_POINTS, $this->getMagicPointsNormalizer($value, $magicPoints)],
            [Quotation::VOTE, $this->getVoteNormalizer($vote)],
        ];
        $instance->method('get')->willReturnMap($map);

        return $instance;
    }

    private function getRowDataInstance($role, $magicPoints, $goals, $vote)
    {
        $instance = $this->getMockBuilder('FFQP\Map\Row\Row')->disableOriginalConstructor()->getMock();
        $instance->role = $role;
        $instance->magicPoints = $magicPoints;
        $instance->goals = $goals;
        $instance->vote = $vote;
        return $instance;
    }

    public function dataProvider()
    {
        return [
            ['-', 'P', 3, 0.0, 0, null, null, null],
            ['-', 'D', 4, 0.0, 0, 0.0, null, 0.0],
            ['0', 'P', 3, 0.0, 0, 0.0, null, 0.0],
            ['0', 'P', 5, 0.0, 0, 0.0, null, 0.0],
            ['0', 'D', 4, 0.0, 0, 0.0, null, 0.0],
            ['6.0', 'P', 3, -3.0, 1, 6.0, 6.0, 6.0],
            ['6.0', 'P', 5, -3.0, 1, 6.0, 6.0, 6.0],
            ['6.0', 'P', 5, 0.0, 0, 6.0, 6.0, 5.0],
            ['10.0', 'D', 3, 4.5, 1, 10.0, 7.0, 8.5],
            ['10.0', 'D', 1, 3.0, 1, 10.0, 7.0, 10.0],
            ['10.0', 'D', 4, 4.5, 1, 10.0, 7.0, 8.5],
            ['10.0', 'C', 4, 4.0, 1, 10.0, 7.0, 9.0],
            ['10.0', 'C', 1, 3.0, 1, 10.0, 7.0, 10.0],
            ['10.0', 'T', 4, 3.5, 1, 10.0, 7.0, 9.5],
            ['10.0', 'A', 4, 3.0, 1, 10.0, 7.0, 10.0],
            ['10.0', 'A', 1, 3.0, 1, 10.0, 7.0, 10.0],
        ];
    }

    /**
     * @dataProvider dataProvider
     * @param * $value
     * @param string $role
     * @param int $version
     * @param float $goalsMagicPoints
     * @param int $goals
     * @param float $magicPoints
     * @param float $vote
     * @param float $result
     */
    public function testNormalize($value, $role, $version, $goalsMagicPoints, $goals, $magicPoints, $vote, $result)
    {
        $normalizer = new OriginalMagicPointsNormalizer();
        $rowData = $this->getRowDataInstance($role, $value, $goalsMagicPoints, $vote);
        if ($result === null) {
            $this->assertNull($normalizer->normalize($value, $rowData, $version, $this->getNormalizerFieldsContainerInstance($value, $magicPoints, $goalsMagicPoints, $goals, $vote)));
        }
        else {
            $this->assertSame($result, $normalizer->normalize($value, $rowData, $version, $this->getNormalizerFieldsContainerInstance($value, $magicPoints, $goalsMagicPoints, $goals, $vote)));
        }
    }
}
