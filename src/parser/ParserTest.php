<?php

use \FFQP\Parser\PlayerDataGenerator;

/**
 * @codeCoverageIgnore
 */
class ParserTest extends PHPUnit_Framework_TestCase
{

    private function _getReaderInstance()
    {
        $reader = $this->getMockBuilder('\FFQP\Reader\SpreadsheetReaderInterface')
          ->setMethods(['getRowCount', 'read'])
          ->disableOriginalConstructor()
          ->getMock();
        $reader->method('getRowCount')->willReturn(4);
        $reader->method('read')->will($this->returnValueMap([
          [3, 1, 1],
          [3, 2, 2],
          [4, 1, 3],
          [4, 2, 4],
        ]));

        return $reader;
    }

    private function _getMapInstance()
    {
        $map = $this->getMockBuilder('\FFQP\Row\Map\RowDataExtractorAbstract')
          ->setMethods(['getOffset', 'getFields'])
          ->disableOriginalConstructor()
          ->getMock();
        $map->method('getFields')->willReturn(['first', 'second']);
        $map->method('getOffset')->will($this->returnValueMap([
          ['first', 1],
          ['second', 2],
        ]));

        return $map;
    }

    private function _getRowDataFactoryInstance()
    {
        $rowDataFactory = $this->getMockBuilder('\FFQP\Row\Data\RowDataFactory')
          ->setMethods(['create'])
          ->disableOriginalConstructor()
          ->getMock();
        $rowDataFactory->method('create')->willReturn(
          $this->getMockBuilder('\FFQP\Row\Data\RowData')->getMock(),
          $this->getMockBuilder('\FFQP\Row\Data\RowData')->getMock()
        );

        return $rowDataFactory;
    }

    private function _getNormalizerInstance()
    {
        $normalizer = $this->getMockBuilder('\FFQP\Row\RowDataNormalizer')
          ->setMethods(['normalize'])
          ->disableOriginalConstructor()
          ->getMock();
        $firstMock = $this->getMockBuilder('\FFQP\Row\Data\PlayerData')->getMock();
        $firstMock->vote = 11;
        $secondMock = $this->getMockBuilder('\FFQP\Row\Data\PlayerData')->getMock();
        $secondMock->vote = 22;
        $normalizer->method('normalize')->willReturn($firstMock, $secondMock);
        return $normalizer;
    }

    public function testGetRowData()
    {
        $parser = new PlayerDataGenerator(
          $this->_getReaderInstance(),
          $this->_getMapInstance(),
          $this->_getNormalizerInstance(),
          $this->_getRowDataFactoryInstance()
        );
        $this->assertSame(2, count($parser->getRowData()));
        $this->assertSame(1, $parser->getRowData()[0]->first);
        $this->assertSame(2, $parser->getRowData()[0]->second);
        $this->assertSame(3, $parser->getRowData()[1]->first);
        $this->assertSame(4, $parser->getRowData()[1]->second);
    }

    public function testGetData()
    {
        $parser = new PlayerDataGenerator(
          $this->_getReaderInstance(),
          $this->_getMapInstance(),
          $this->_getNormalizerInstance(),
          $this->_getRowDataFactoryInstance()
        );
        $data = $parser->getPlayerData();
        $this->assertSame(2, count($data));
        $this->assertSame(11, $data[0]->vote);
        $this->assertSame(22, $data[1]->vote);
    }
}
