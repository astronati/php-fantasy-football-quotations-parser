<?php

use PHPUnit\Framework\TestCase;
use FFQP\Map\Row\Normalizer\Field\Type\SecondaryRoleNormalizer;

class SecondaryRoleNormalizerTest extends TestCase
{
    private function getNormalizerFieldsContainerInstance()
    {
        $instance = $this->getMockBuilder('FFQP\Map\Row\Normalizer\Field\NormalizedFieldsContainer')->disableOriginalConstructor()->getMock();
        return $instance;
    }

    public function dataProvider()
    {
        return [
          ['P', 'P', 'P'],
          ['D', 'D', 'D'],
          ['C', 'C', 'C'],
          ['T', 'A', 'A'],
          ['A', 'A', 'A'],
          ['A', '', 'A'],
          ['A', ' ', 'A'],
        ];
    }

    private function getRowMock($role) {
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
        $rowMock = $this->getRowMock($role);
        $normalizer = new SecondaryRoleNormalizer();
        $this->assertSame(
          $result,
          $normalizer->normalize(
            $secondaryRole,
            $rowMock,
            1,
            $this->getNormalizerFieldsContainerInstance()
          )
        );
    }
}
