<?php

use PHPUnit\Framework\TestCase;
use drdhnrq\PhpAppliedStatistics\Traits\Helpers;


class HelpersTest extends TestCase
{
    /**
     * Get the trait to apply the tests
     */
    private function getMockTrait()
    {
        return $this->getMockForTrait(Helpers::class);
    }

    /**
     * This method verifies if the property decimalPlaces exists
     * in the Trait file
     *
     * @return void
     */
    public function testExpectedThatDecimalPlacesProtectedExists()
    {
        $mockTrait =  $this->getMockTrait();
        $this->assertTrue(
            property_exists($mockTrait, 'decimalPlaces'),
            'The Trait Helpers not have property decimalPlaces'
        );
    }

    /**
     * This test verifies if the method round exists in the trait helpers
     *
     * @return void
     */
    public function testExpectedThatRoundMethodExists()
    {
        $mockTrait =  $this->getMockTrait();
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
        $mockTrait =  $this->getMockTrait();
        $this->assertTrue(
            method_exists($mockTrait, 'calcPercent'),
            'The Trait Helpers not have method calcPercent'
        );
    }

    /**
     * This test verifies if the round method is using the default decimal
     * places declared in the trait to round the numbers when the decimal
     * places wasnt passed as argument method
     *
     * @return void
     */
    public function testExpectedThatRoundMethodUsesDefaultDecimalPlaces()
    {
        $mockTrait = $this->getMockForTrait(Helpers::class);

        $this->assertEquals(1.4515, $mockTrait->round(1.4515));
        $this->assertEquals(1.4516, $mockTrait->round(1.45155));
        $this->assertEquals(1.4515, $mockTrait->round(1.45151));
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

        $this->assertEquals(1.453, $mockTrait->round(1.4534, 3));
        $this->assertEquals(1.43, $mockTrait->round(1.434, 2));
        $this->assertEquals(1.5, $mockTrait->round(1.4534, 1));
        $this->assertEquals(1.0, $mockTrait->round(1.434, 0));
    }

    /**
     * This method verifies if the calcPercent method is calculating the amount
     * right and if it is using the default decimal places to return the result
     * of calculation
     */
    public function testExpectedCalcPercentMethodUsesDefaultDecimalPlaces()
    {
        $mockTrait = $this->getMockForTrait(Helpers::class);

        $this->assertEquals(10, $mockTrait->calcPercent(100, 10));
        $this->assertEquals(11.685, $mockTrait->calcPercent(123, 9.5));
        $this->assertEquals(19.2044, $mockTrait->calcPercent(1243, 1.545));
    }

    /**
     * This method verifies if the calcPercent method is calculating the amount
     * right and if it is using de decimal places to return the result with the
     * limit decimal places passed as argument in the method
     *
     * @return void
     */
    public function testExpectedCalcPercentMethodUseDecimalPlacesPassdsArgumentsMethod()
    {
        $mockTrait = $this->getMockForTrait(Helpers::class);

        $this->assertEquals(11.69, $mockTrait->calcPercent(123, 9.5, 2));
        $this->assertEquals(19.2, $mockTrait->calcPercent(1243, 1.545, 1));
    }
}