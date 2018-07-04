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

    private function getNormalizerFieldsContainerInstance($value, $vote, $status)
    {
        $instance = $this->getMockBuilder('FFQP\Map\Row\Normalizer\Field\NormalizedFieldsContainer')
          ->disableOriginalConstructor()
          ->setMethods(['get'])
          ->getMock();

        $map = [
          [Quotation::VOTE, $this->getVoteNormalizer($vote)],
          [Quotation::ACTIVE, $this->getStatusNormalizer($status)],
        ];
        $instance->method('get')->willReturnMap($map);

        return $instance;
    }

    private function getRowDataInstance($role, $vote, $active)
    {
        $instance = $this->getMockBuilder('FFQP\Map\Row\Row')->disableOriginalConstructor()->getMock();
        $instance->role = $role;
        $instance->status = $active;
        $instance->vote = $vote;
        return $instance;
    }

    public function dataProvider()
    {
        return [
          ['-', 'P', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2017, null, true, null],
          ['-', 'D', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_WORLD_CUP_2018, null, true, null],
          ['0', 'P', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2017, 1.0, true, 0.0],
          ['6', 'P', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2017, 1.0, true, 6.0],
          ['6', 'D', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_WORLD_CUP_2018, 1.0, true, 6.0],
        ];
    }

    /**
     * @dataProvider dataProvider
     * @param * $value
     * @param string $role
     * @param string $format
     * @param float|null $vote
     * @param bool $active
     * @param float $result
     */
    public function testNormalize($value, $role, $format, $vote, $active, $result)
    {
        $normalizer = new MagicPointsNormalizer();
        $rowData = $this->getRowDataInstance($role, $vote, $active);
        $normalizedValue = $normalizer->normalize($value, $rowData, $format, $this->getNormalizerFieldsContainerInstance($value, $vote, $active));
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
