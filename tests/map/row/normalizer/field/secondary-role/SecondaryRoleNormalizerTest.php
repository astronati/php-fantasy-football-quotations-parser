<?php

use PHPUnit\Framework\TestCase;
use FFQP\Map\Row\SecondaryRoleNormalizer;

class SecondaryRoleNormalizerTest extends TestCase
{

    public function dataProvider()
    {
        return [
          ['P', 'P', 'P'],
          ['D', 'D', 'D'],
          ['C', 'C', 'C'],
          ['T', 'A', 'A'],
          ['A', 'A', 'A'],
          ['A', '', 'A'],
        ];
    }

    private function _getRowMock($role) {
        $rowMock = $this->getMockBuilder('FFQP\Map\Row\Row')->disableOriginalConstructor()->getMock();
        $rowMock->role = $role;
        return $rowMock;
    }

    /**
     * @dataProvider dataProvider
     * @param string $role
     * @param string $secondaryRole
     * @param string $result
     */
    public function testNormalize($role, $secondaryRole, $result)
    {
        $rowMock = $this->_getRowMock($role);
        $secondaryRoleNormalizer = new SecondaryRoleNormalizer();
        $this->assertInternalType(
          'string',
          $secondaryRoleNormalizer->normalize(
            $secondaryRole,
            $rowMock,
            'any_type'
          )
        );
        $this->assertSame(
          $result,
          $secondaryRoleNormalizer->normalize(
            $secondaryRole,
            $rowMock,
            'any_type'
          )
        );
    }
}
