<?php

use \FFQP\Parser\Parser as Parser;

/**
 * @codeCoverageIgnore
 */
class ParserTest extends PHPUnit_Framework_TestCase
{

    private function _getReaderInstance()
    {
        $reader = $this->getMockBuilder('\FFQP\Reader\ReaderInterface')
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
        $map = $this->getMockBuilder('\FFQP\Row\Map\RowMapAbstract')
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

    private function _getRawDataFactoryInstance()
    {
        $rawDataFactory = $this->getMockBuilder('\FFQP\Row\Data\RawDataFactory')
          ->setMethods(['create'])
          ->disableOriginalConstructor()
          ->getMock();
        $rawDataFactory->method('create')->willReturn(
          $this->getMockBuilder('\FFQP\Row\Data\RawData')->getMock(),
          $this->getMockBuilder('\FFQP\Row\Data\RawData')->getMock()
        );

        return $rawDataFactory;
    }

    private function _getNormalizerInstance()
    {
        $normalizer = $this->getMockBuilder('\FFQP\Row\RowNormalizer')
          ->setMethods(['normalize'])
          ->disableOriginalConstructor()
          ->getMock();
        $firstMock = $this->getMockBuilder('\FFQP\Row\Data\Data')->getMock();
        $firstMock->vote = 11;
        $secondMock = $this->getMockBuilder('\FFQP\Row\Data\Data')->getMock();
        $secondMock->vote = 22;
        $normalizer->method('normalize')->willReturn($firstMock, $secondMock);
        return $normalizer;
    }

    public function testGetRawData()
    {
        $parser = new Parser(
          $this->_getReaderInstance(),
          $this->_getMapInstance(),
          $this->_getNormalizerInstance(),
          $this->_getRawDataFactoryInstance()
        );
        $this->assertSame(2, count($parser->getRawData()));
        $this->assertSame(1, $parser->getRawData()[0]->first);
        $this->assertSame(2, $parser->getRawData()[0]->second);
        $this->assertSame(3, $parser->getRawData()[1]->first);
        $this->assertSame(4, $parser->getRawData()[1]->second);
    }

    public function testGetData()
    {
        $parser = new Parser(
          $this->_getReaderInstance(),
          $this->_getMapInstance(),
          $this->_getNormalizerInstance(),
          $this->_getRawDataFactoryInstance()
        );
        $data = $parser->getData();
        $this->assertSame(2, count($data));
        $this->assertSame(11, $data[0]->vote);
        $this->assertSame(22, $data[1]->vote);
    }
}
