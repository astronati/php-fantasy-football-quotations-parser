<?php

use \FFQP\Row\RowNormalizer as RowNormalizer;

/**
 * @codeCoverageIgnore
 */
class RowNormalizerTest extends PHPUnit_Framework_TestCase {

  public function dataProvider() {
    return array(
      array(
        array('field1' => '5', 'field2' => '0'),
        4
      ),
    );
  }

  private function _getDataFactoryInstance() {
    $dataFactory = $this->getMockBuilder('\FFQP\Row\Data\DataFactory')
      ->setMethods(array('create'))
      ->disableOriginalConstructor()
      ->getMock();
    $dataFactory->method('create')->willReturn($this->getMockBuilder('\FFQP\Row\Data\Data')->getMock());

    return $dataFactory;
  }

  private function _getRawDataFactoryInstance($config) {
    $rawData = $this->getMockBuilder('\FFQP\Row\Data\RawData')->getMock();
    foreach ($config as $field => $value) {
      $rawData->$field = $value;
    }
    return $rawData;
  }

  private function _getRowMapInstance() {
    $rowMap = $this->getMockBuilder('\FFQP\Row\Map\SeasonMap2013')
      ->setMethods(array('getFields'))
      ->disableOriginalConstructor()
      ->getMock();
    $rowMap->method('getFields')->willReturn(['field1', 'field2']);
    $rowMap->season = '2017';

    return $rowMap;
  }

  private function _getCellNormalizerFactoryInstance() {
    $cellNormalizer = $this->getMockBuilder('\FFQP\Row\Cell\YellowCardsNormalizer')
      ->setMethods(array('normalize'))
      ->disableOriginalConstructor()
      ->getMock();
    $cellNormalizer->method('normalize')->willReturn(4);

    $cellNormalizerFactory = $this->getMockBuilder('\FFQP\Row\Cell\CellNormalizerFactory')
      ->setMethods(array('create'))
      ->disableOriginalConstructor()
      ->getMock();
    $cellNormalizerFactory->method('create')->willReturn($cellNormalizer);

    return $cellNormalizerFactory;
  }

  /**
   * @dataProvider dataProvider
   * @param array $config
   * @param array $result
   */
  public function testNormalize($config, $result) {
    $rowNormalizer = new RowNormalizer($this->_getDataFactoryInstance(), $this->_getCellNormalizerFactoryInstance());
    $rowMap = $this->_getRowMapInstance();
    $this->assertSame($result, $rowNormalizer->normalize($this->_getRawDataFactoryInstance($config), $rowMap)->field1);
    $this->assertSame($result, $rowNormalizer->normalize($this->_getRawDataFactoryInstance($config), $rowMap)->field2);
  }
}
