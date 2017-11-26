<?php

use \FFQP\Row\Cell\GoalsNormalizer as GoalsNormalizer;

/**
 * @codeCoverageIgnore
 */
class GoalsNormalizerTest extends PHPUnit_Framework_TestCase {

  public function dataProvider() {
    return array(
      array('-', 'P', 'P', '2017', 0),
      array('0', 'P', 'P', '2017', 0),
      array('0.0', 'P', 'P', '2017', 0),
      array('0,0', 'P', 'P', '2017', 0),
      array(0, 'P', 'P', '2017', 0),
      array('-3.0', 'P', 'P', '2017', 3),
      array('10.0', 'P', 'P', '2017', 2),
      array('9.0', 'D', 'D', '2017', 2),
      array('8.0', 'C', 'C', '2017', 2),
      array('7.0', 'C', 'T', '2017', 2),
      array('7.0', 'A', 'T', '2017', 2),
      array('6.0', 'A', 'A', '2017', 2),
      array('6.0', 'A', 'A', '2016', 2),
    );
  }

  private function _getRawDataInstance($role, $secondaryRole) {
    $instance = $this->getMockBuilder('\FFQP\Row\Data\RawData')->getMock();
    $instance->role = $role;
    $instance->secondaryRole = $secondaryRole;
    return $instance;
  }

  /**
   * @dataProvider dataProvider
   * @param * $value
   * @param string $role
   * @param string $secondaryRole
   * @param string $season;
   * @param int $result
   */
  public function testNormalize($value, $role, $secondaryRole, $season, $result) {
    $goals = new GoalsNormalizer();
    $rawData = $this->_getRawDataInstance($role, $secondaryRole);
    $this->assertInternalType('int', $goals->normalize($value, $rawData, $season));
    $this->assertSame($result, $goals->normalize($value, $rawData, $season));
  }
}
