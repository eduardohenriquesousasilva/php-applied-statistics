<?php

use PHPUnit\Framework\TestCase;
use drdhnrq\PhpAppliedStatistics\AppliedStatistics;

class AppliedStatistcsTest extends TestCase
{
    /**
     * This test verifies if the constant DEFAULT_DECIMAL_PLACES exists
     * in the class
     *
     * @return void
     */
    public function testExpectedConstantDefaultDecimalPlacesExists()
    {
        $appliedStatistics = new ReflectionClass(AppliedStatistics::class);
        $this->assertArrayHasKey('DEFAULT_DECIMAL_PLACES', $appliedStatistics->getConstants());
    }

    /**
     * This test verifies if the property decimalPlaces exists
     * in the Class
     *
     * @return void
     */
    public function testExpectedPropertyDecimalPlacesExists()
    {
        $appliedStatistics = new AppliedStatistics();
        $this->assertTrue(
            property_exists($appliedStatistics, 'decimalPlaces'),
            'The Class AppliedStatistics not have property decimalPlaces'
        );
    }

    /**
     * This test verifies if the decimal places is defined the value of
     * constant DEFAULT_DECIMAL_PLACES when the class AppliedStatistics
     * is instance without pass default places argument
     *
     * @return void
     */
    public function testExpetedInstanceClassUseConstantDefaultDecimalPlaces()
    {
        $appliedStatistics = new AppliedStatistics();
        $this->assertEquals(5, $appliedStatistics->decimalPlaces);
    }

    /**
     * This test verifies if de decimal places is defined with the value that
     * was passed as argument to instantiate the class
     *
     * @return void
     */
    public function testExpectedInstanceClassUseDecimalPlacesPassedAsArgumentConstructor()
    {
        $appliedStatistics = new AppliedStatistics(3);
        $this->assertEquals(3, $appliedStatistics->decimalPlaces);

        $appliedStatistics = new AppliedStatistics(1);
        $this->assertEquals(1, $appliedStatistics->decimalPlaces);
    }
}