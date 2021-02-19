<?php

namespace Tests\Model;

use PHPUnit\Framework\TestCase;
use FFQP\Model\Quotation as Quotation;

class QuotationTest extends TestCase
{
    public function dataProvider()
    {
        return [
          [
            [
              'code' => '101',
              'player' => 'name',
              'team' => 'fidelis',
              'role' => 'T',
              'secondaryRole' => 'C',
              'active' => true,
              'quotation' => '12',
              'magicPoints' => null,
              'originalMagicPoints' => null,
              'vote' => null,
              'goalsMagicPoints' => 0,
              'goals' => 0,
              'yellowCardMagicPoints' => 0,
              'yellowCards' => 0,
              'redCardsMagicPoints' => 0,
              'redCards' => 0,
              'penaltiesMagicPoints' => 0,
              'penalties' => 0,
              'autoGoalsMagicPoints' => 0,
              'autoGoals' => 0,
              'assistsMagicPoints' => 0,
              'assists' => 0,
            ],
            [
              'getCode' => '101',
              'getPlayer' => 'name',
              'getTeam' => 'fidelis',
              'getRole' => 'T',
              'getSecondaryRole' => 'C',
              'isActive' => true,
              'getQuotation' => 12,
              'getMagicPoints' => null,
              'getOriginalMagicPoints' => null,
              'getVote' => null,
              'getGoalsMagicPoints' => 0.0,
              'getGoals' => 0,
              'getYellowCardMagicPoints' => 0.0,
              'isCautioned' => false,
              'getRedCardMagicPoints' => 0.0,
              'isSentOff' => false,
              'getPenaltiesMagicPoints' => 0.0,
              'getPenalties' => 0,
              'getAutoGoalsMagicPoints' => 0.0,
              'getAutoGoals' => 0,
              'getAssistsMagicPoints' => 0.0,
              'getAssists' => 0,
              'isWithoutVote' => true,
              'hasPlayed' => false
            ]
          ],
          [
            [
              'code' => '101',
              'player' => 'name',
              'team' => 'fidelis',
              'role' => 'T',
              'secondaryRole' => 'C',
              'active' => true,
              'quotation' => '12',
              'magicPoints' => '5.5',
              'originalMagicPoints' => '5.5',
              'vote' => '6',
              'goalsMagicPoints' => 9,
              'goals' => '3',
              'yellowCardMagicPoints' => -0.5,
              'yellowCards' => 1,
              'redCardsMagicPoints' => -1,
              'redCards' => 1,
              'penaltiesMagicPoints' => 9,
              'penalties' => '3',
              'autoGoalsMagicPoints' => -2,
              'autoGoals' => '-2',
              'assistsMagicPoints' => 2,
              'assists' => '2',
            ],
            [
              'getCode' => '101',
              'getPlayer' => 'name',
              'getTeam' => 'fidelis',
              'getRole' => 'T',
              'getSecondaryRole' => 'C',
              'isActive' => true,
              'getQuotation' => 12,
              'getMagicPoints' => 5.5,
              'getOriginalMagicPoints' => 5.5,
              'getVote' => 6.0,
              'getGoalsMagicPoints' => 9.0,
              'getGoals' => 3,
              'getYellowCardMagicPoints' => -0.5,
              'isCautioned' => true,
              'getRedCardMagicPoints' => -1.0,
              'isSentOff' => true,
              'getPenaltiesMagicPoints' => 9.0,
              'getPenalties' => 3,
              'getAutoGoalsMagicPoints' => -2.0,
              'getAutoGoals' => -2,
              'getAssistsMagicPoints' => 2.0,
              'getAssists' => 2,
              'isWithoutVote' => false,
              'hasPlayed' => true
            ]
          ],
          [
            [
              'code' => '101',
              'player' => 'name',
              'team' => 'fidelis',
              'role' => 'T',
              'secondaryRole' => 'C',
              'active' => true,
              'quotation' => '12',
              'magicPoints' => '5.5',
              'originalMagicPoints' => '3.5',
              'vote' => null,
              'goalsMagicPoints' => 3,
              'goals' => '3',
              'yellowCardMagicPoints' => -0.5,
              'yellowCards' => 1,
              'redCardsMagicPoints' => -1,
              'redCards' => 1,
              'penaltiesMagicPoints' => 9,
              'penalties' => '3',
              'autoGoalsMagicPoints' => -2,
              'autoGoals' => '-2',
              'assistsMagicPoints' => 2,
              'assists' => '2',
            ],
            [
              'getCode' => '101',
              'getPlayer' => 'name',
              'getTeam' => 'fidelis',
              'getRole' => 'T',
              'getSecondaryRole' => 'C',
              'isActive' => true,
              'getQuotation' => 12,
              'getMagicPoints' => 5.5,
              'getOriginalMagicPoints' => 3.5,
              'getVote' => null,
              'getGoalsMagicPoints' => 3.0,
              'getGoals' => 3,
              'getYellowCardMagicPoints' => -0.5,
              'isCautioned' => true,
              'getRedCardMagicPoints' => -1.0,
              'isSentOff' => true,
              'getPenaltiesMagicPoints' => 9.0,
              'getPenalties' => 3,
              'getAutoGoalsMagicPoints' => -2.0,
              'getAutoGoals' => -2,
              'getAssistsMagicPoints' => 2.0,
              'getAssists' => 2,
              'isWithoutVote' => true,
              'hasPlayed' => true
            ]
          ]
        ];
    }

    private function getQuotationInstance($config)
    {
        return new Quotation(
          $config['code'],
          $config['player'],
          $config['team'],
          $config['role'],
          $config['secondaryRole'],
          $config['active'],
          $config['quotation'],
          $config['magicPoints'],
          $config['originalMagicPoints'],
          $config['vote'],
          $config['goalsMagicPoints'],
          $config['goals'],
          $config['yellowCardMagicPoints'],
          $config['yellowCards'],
          $config['redCardsMagicPoints'],
          $config['redCards'],
          $config['penaltiesMagicPoints'],
          $config['penalties'],
          $config['autoGoalsMagicPoints'],
          $config['autoGoals'],
          $config['assistsMagicPoints'],
          $config['assists']
        );
    }

    /**
     * @dataProvider dataProvider
     * @param array $config
     * @param array $result
     */
    public function testGetCode($config, $result)
    {
        $quotation = $this->getQuotationInstance($config);
        $this->assertIsString($quotation->getCode());
        $this->assertSame($result['getCode'], $quotation->getCode());
    }

    /**
     * @dataProvider dataProvider
     * @param array $config
     * @param array $result
     */
    public function testGetPlayer($config, $result)
    {
        $quotation = $this->getQuotationInstance($config);
        $this->assertIsString($quotation->getPlayer());
        $this->assertSame($result['getPlayer'], $quotation->getPlayer());
    }

    /**
     * @dataProvider dataProvider
     * @param array $config
     * @param array $result
     */
    public function testGetTeam($config, $result)
    {
        $quotation = $this->getQuotationInstance($config);
        $this->assertIsString($quotation->getTeam());
        $this->assertSame($result['getTeam'], $quotation->getTeam());
    }

    /**
     * @dataProvider dataProvider
     * @param array $config
     * @param array $result
     */
    public function testGetRole($config, $result)
    {
        $quotation = $this->getQuotationInstance($config);
        $this->assertIsString($quotation->getRole());
        $this->assertSame($result['getRole'], $quotation->getRole());
    }

    /**
     * @dataProvider dataProvider
     * @param array $config
     * @param array $result
     */
    public function testGetSecondaryRole($config, $result)
    {
        $quotation = $this->getQuotationInstance($config);
        $this->assertIsString($quotation->getSecondaryRole());
        $this->assertSame($result['getSecondaryRole'], $quotation->getSecondaryRole());
    }

    /**
     * @dataProvider dataProvider
     * @param array $config
     * @param array $result
     */
    public function testIsActive($config, $result)
    {
        $quotation = $this->getQuotationInstance($config);
        $this->assertIsBool($quotation->isActive());
        $this->assertSame($result['isActive'], $quotation->isActive());
    }

    /**
     * @dataProvider dataProvider
     * @param array $config
     * @param array $result
     */
    public function testGetQuotation($config, $result)
    {
        $quotation = $this->getQuotationInstance($config);
        $this->assertIsInt($quotation->getQuotation());
        $this->assertSame($result['getQuotation'], $quotation->getQuotation());
    }

    /**
     * @dataProvider dataProvider
     * @param array $config
     * @param array $result
     */
    public function testGetMagicPoints($config, $result)
    {
        $quotation = $this->getQuotationInstance($config);
        if (is_null($quotation->getMagicPoints())) {
            $this->assertNull($quotation->getMagicPoints());
        } else {
            $this->assertIsFloat($quotation->getMagicPoints());
        }
        $this->assertSame($result['getMagicPoints'], $quotation->getMagicPoints());
    }

    /**
     * @dataProvider dataProvider
     * @param array $config
     * @param array $result
     */
    public function testGetOriginalMagicPoints($config, $result)
    {
        $quotation = $this->getQuotationInstance($config);
        if (is_null($quotation->getOriginalMagicPoints())) {
            $this->assertNull($quotation->getOriginalMagicPoints());
        } else {
            $this->assertIsFloat($quotation->getOriginalMagicPoints());
        }
        $this->assertSame($result['getOriginalMagicPoints'], $quotation->getOriginalMagicPoints());
    }

    /**
     * @dataProvider dataProvider
     * @param array $config
     * @param array $result
     */
    public function testGetVote($config, $result)
    {
        $quotation = $this->getQuotationInstance($config);
        if (is_null($quotation->getVote())) {
            $this->assertNull($quotation->getVote());
        } else {
            $this->assertIsFloat($quotation->getVote());
        }
        $this->assertSame($result['getVote'], $quotation->getVote());
    }

    /**
     * @dataProvider dataProvider
     * @param array $config
     * @param array $result
     */
    public function testHasPlayed($config, $result)
    {
        $quotation = $this->getQuotationInstance($config);
        $this->assertIsBool($quotation->hasPlayed());
        $this->assertSame($result['hasPlayed'], $quotation->hasPlayed());
    }

    /**
     * @dataProvider dataProvider
     * @param array $config
     * @param array $result
     */
    public function testIsWithoutVote($config, $result)
    {
        $quotation = $this->getQuotationInstance($config);
        $this->assertIsBool($quotation->isWithoutVote());
        $this->assertSame($result['isWithoutVote'], $quotation->isWithoutVote());
    }

    /**
     * @dataProvider dataProvider
     * @param array $config
     * @param array $result
     */
    public function testGetGoalsMagicPoints($config, $result)
    {
        $quotation = $this->getQuotationInstance($config);
        $this->assertIsFloat($quotation->getGoalsMagicPoints());
        $this->assertSame($result['getGoalsMagicPoints'], $quotation->getGoalsMagicPoints());
    }

    /**
     * @dataProvider dataProvider
     * @param array $config
     * @param array $result
     */
    public function testGetGoals($config, $result)
    {
        $quotation = $this->getQuotationInstance($config);
        $this->assertIsInt($quotation->getGoals());
        $this->assertSame($result['getGoals'], $quotation->getGoals());
    }

    /**
     * @dataProvider dataProvider
     * @param array $config
     * @param array $result
     */
    public function testGetYellowCardMagicPoints($config, $result)
    {
        $quotation = $this->getQuotationInstance($config);
        $this->assertIsFloat($quotation->getYellowCardMagicPoints());
        $this->assertSame($result['getYellowCardMagicPoints'], $quotation->getYellowCardMagicPoints());
    }

    /**
     * @dataProvider dataProvider
     * @param array $config
     * @param array $result
     */
    public function testIsCautioned($config, $result)
    {
        $quotation = $this->getQuotationInstance($config);
        $this->assertIsBool($quotation->isCautioned());
        $this->assertSame($result['isCautioned'], $quotation->isCautioned());
    }

    /**
     * @dataProvider dataProvider
     * @param array $config
     * @param array $result
     */
    public function testGetRedCardMagicPoints($config, $result)
    {
        $quotation = $this->getQuotationInstance($config);
        $this->assertIsFloat($quotation->getRedCardMagicPoints());
        $this->assertSame($result['getRedCardMagicPoints'], $quotation->getRedCardMagicPoints());
    }

    /**
     * @dataProvider dataProvider
     * @param array $config
     * @param array $result
     */
    public function testIsSentOff($config, $result)
    {
        $quotation = $this->getQuotationInstance($config);
        $this->assertIsBool($quotation->isSentOff());
        $this->assertSame($result['isSentOff'], $quotation->isSentOff());
    }

    /**
     * @dataProvider dataProvider
     * @param array $config
     * @param array $result
     */
    public function testGetPenaltiesMagicPoints($config, $result)
    {
        $quotation = $this->getQuotationInstance($config);
        $this->assertIsFloat($quotation->getPenaltiesMagicPoints());
        $this->assertSame($result['getPenaltiesMagicPoints'], $quotation->getPenaltiesMagicPoints());
    }

    /**
     * @dataProvider dataProvider
     * @param array $config
     * @param array $result
     */
    public function testGetPenalties($config, $result)
    {
        $quotation = $this->getQuotationInstance($config);
        $this->assertIsInt($quotation->getPenalties());
        $this->assertSame($result['getPenalties'], $quotation->getPenalties());
    }

    /**
     * @dataProvider dataProvider
     * @param array $config
     * @param array $result
     */
    public function testGetAutoGoalsMagicPoints($config, $result)
    {
        $quotation = $this->getQuotationInstance($config);
        $this->assertIsFloat($quotation->getAutoGoalsMagicPoints());
        $this->assertSame($result['getAutoGoalsMagicPoints'], $quotation->getAutoGoalsMagicPoints());
    }

    /**
     * @dataProvider dataProvider
     * @param array $config
     * @param array $result
     */
    public function testGetAutoGoals($config, $result)
    {
        $quotation = $this->getQuotationInstance($config);
        $this->assertIsInt($quotation->getAutoGoals());
        $this->assertSame($result['getAutoGoals'], $quotation->getAutoGoals());
    }

    /**
     * @dataProvider dataProvider
     * @param array $config
     * @param array $result
     */
    public function testGetAssistsMagicPoints($config, $result)
    {
        $quotation = $this->getQuotationInstance($config);
        $this->assertIsFloat($quotation->getAssistsMagicPoints());
        $this->assertSame($result['getAssistsMagicPoints'], $quotation->getAssistsMagicPoints());
    }

    /**
     * @dataProvider dataProvider
     * @param array $config
     * @param array $result
     */
    public function testGetAssists($config, $result)
    {
        $quotation = $this->getQuotationInstance($config);
        $this->assertIsInt($quotation->getAssists());
        $this->assertSame($result['getAssists'], $quotation->getAssists());
    }
}
