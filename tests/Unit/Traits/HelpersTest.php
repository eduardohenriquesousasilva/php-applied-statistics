<?php

use PHPUnit\Framework\TestCase;
use drdhnrq\PhpAppliedStatistics\Traits\Helpers;

class HelpersTest extends TestCase
{
    /**
     * This test verifies if the method round exists in the trait helpers
     *
     * @return void
     */
    public function testExpectedThatRoundMethodExists()
    {
        $mockTrait = $this->getMockForTrait(Helpers::class);
        $this->assertTrue(
            method_exists($mockTrait, 'round'),
            'The Trait Helpers not have method round'
        );
    }

    /**
     * This test verifies if the method calcPercent exists in the trait helpers
     *
     * @return void
     */
    public function testExpectedThatCalcPercentMethodExists()
    {
        $mockTrait = $this->getMockForTrait(Helpers::class);
        $this->assertTrue(
            method_exists($mockTrait, 'calcPercent'),
            'The Trait Helpers not have method calcPercent'
        );
    }

    /**
     * This test verifies if the round method doesnt round the value when
     * it doesnt receive the argument decimal places
     *
     * @return void
     */
    public function testExpectedRoundMethodDoesntRounValueWhenDoesntReceiveDecimalPlaces()
    {
        $mockTrait = $this->getMockForTrait(Helpers::class);

        $this->assertEquals(1.4515, $mockTrait->round(1.4515));
        $this->assertEquals(1.45155, $mockTrait->round(1.45155));
        $this->assertEquals(1.45151, $mockTrait->round(1.45151));
    }

    /**
     * This method verifies if the round method is applying the decimal places
     * passeds as argument method
     *
     * @return void
     */
    public function testExpectedThatRoundMethodUseDecimalPlacesPassedsArgumentMethod()
    {
        $mockTrait = $this->getMockForTrait(Helpers::class);

        $this->assertEquals(300, $mockTrait->round(300.32, 0));
        $this->assertEquals(404, $mockTrait->round(403.6440, 0));
        $this->assertEquals(35.3, $mockTrait->round(35.32216, 1));
        $this->assertEquals(456.5, $mockTrait->round(456.541, 1));
        $this->assertEquals(2303.9, $mockTrait->round(2303.8714, 1));
        $this->assertEquals(23.46, $mockTrait->round(23.4585, 2));
        $this->assertEquals(171.29, $mockTrait->round(171.29401, 2));
        $this->assertEquals(15.216, $mockTrait->round(15.21622, 3));
        $this->assertEquals(603.823, $mockTrait->round(603.822714, 3));
    }

    /**
     * This method verifies if the calcPercent method is calculating the amount
     * right
     *
     * @return void
     */
    public function testExpectedCalcPercentMethodUseDecimalPlacesPassdsArgumentsMethod()
    {
        $mockTrait = $this->getMockForTrait(Helpers::class);

        $this->assertEquals(3690.00, $mockTrait->calcPercent(24600.00, 15));
        $this->assertEquals(14670.00, $mockTrait->calcPercent(244500.00, 6));
        $this->assertEquals(547.2, $mockTrait->calcPercent(5700.00, 9.6));
        $this->assertEquals(42, $mockTrait->calcPercent(600, 7));
        $this->assertEquals(1305.1, $mockTrait->calcPercent(6200, 21.05));
        $this->assertEquals(11.685, $mockTrait->calcPercent(123, 9.5));
        $this->assertEquals(19.204349999999998, $mockTrait->calcPercent(1243, 1.545, 1));
    }
}