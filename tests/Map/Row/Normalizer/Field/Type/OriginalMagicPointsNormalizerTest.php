<?php

namespace Tests\Map\Row\Normalizer\Field\Type;

use FFQP\Map\Row\Normalizer\Field\Type\OriginalMagicPointsNormalizer;
use FFQP\Model\Quotation;
use FFQP\Parser\QuotationsParserFactory;
use PHPUnit\Framework\TestCase;

class OriginalMagicPointsNormalizerTest extends TestCase
{
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

    private function getNormalizerFieldsContainerInstance($value, $magicPoints, $goalsMagicPoints, $goals)
    {
        $instance = $this->getMockBuilder('FFQP\Map\Row\Normalizer\Field\NormalizedFieldsContainer')
          ->disableOriginalConstructor()
          ->setMethods(['get'])
          ->getMock();

        $map = [
          [Quotation::GOALS, $this->getGoalsNormalizer($goalsMagicPoints, $goals)],
          [Quotation::MAGIC_POINTS, $this->getMagicPointsNormalizer($value, $magicPoints)],
        ];
        $instance->method('get')->willReturnMap($map);

        return $instance;
    }

    private function getRowDataInstance($role, $magicPoints, $goals)
    {
        $instance = $this->getMockBuilder('FFQP\Map\Row\Row')->disableOriginalConstructor()->getMock();
        $instance->role = $role;
        $instance->magicPoints = $magicPoints;
        $instance->goals = $goals;
        return $instance;
    }

    public function dataProvider()
    {
        return [
          ['-', 'P', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2017, 0.0, 0, null, null],
          ['-', 'D', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_WORLD_CUP_2018, 0.0, 0, 0.0, 0.0],
          ['0', 'P', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2017, 0.0, 0, 0.0, 0.0],
          ['0', 'D', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_WORLD_CUP_2018, 0.0, 0, 0.0, 0.0],
          ['6.0', 'P', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2017, -3.0, 1, 6, 6.0],
          ['10.0', 'D', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2017, 4.5, 1, 10.0, 8.5],
          ['10.0', 'D', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2013, 3.0, 1, 10.0, 10.0],
          ['10.0', 'D', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_WORLD_CUP_2018, 4.5, 1, 10.0, 8.5],
          ['10.0', 'C', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_WORLD_CUP_2018, 4.0, 1, 10.0, 9.0],
          ['10.0', 'C', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2013, 3.0, 1, 10.0, 10.0],
          ['10.0', 'T', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_WORLD_CUP_2018, 3.5, 1, 10.0, 9.5],
          ['10.0', 'A', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_WORLD_CUP_2018, 3.0, 1, 10.0, 10.0],
          ['10.0', 'A', QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2013, 3.0, 1, 10.0, 10.0],
        ];
    }

    /**
     * @dataProvider dataProvider
     * @param * $value
     * @param string $role
     * @param string $format
     * @param float $goalsMagicPoints
     * @param int $goals
     * @param float $magicPoints
     * @param float $result
     */
    public function testNormalize($value, $role, $format, $goalsMagicPoints, $goals, $magicPoints, $result)
    {
        $normalizer = new OriginalMagicPointsNormalizer();
        $rowData = $this->getRowDataInstance($role, $value, $goalsMagicPoints);
        if ($result === null) {
            $this->assertInternalType('null', $normalizer->normalize($value, $rowData, $format, $this->getNormalizerFieldsContainerInstance($value, $magicPoints, $goalsMagicPoints, $goals)));
            $this->assertNull($normalizer->normalize($value, $rowData, $format, $this->getNormalizerFieldsContainerInstance($value, $magicPoints, $goalsMagicPoints, $goals)));
        }
        else {
            $this->assertInternalType('float', $normalizer->normalize($value, $rowData, $format, $this->getNormalizerFieldsContainerInstance($value, $magicPoints, $goalsMagicPoints, $goals)));
            $this->assertSame($result, $normalizer->normalize($value, $rowData, $format, $this->getNormalizerFieldsContainerInstance($value, $magicPoints, $goalsMagicPoints, $goals)));
        }
    }
}
