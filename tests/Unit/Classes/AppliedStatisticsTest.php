<?php

use PHPUnit\Framework\TestCase;
use drdhnrq\PhpAppliedStatistics\AppliedStatistics;

class AppliedStatistcsTest extends TestCase
{
    /********************************************************************************
     *
     * SMOKE TESTS
     *
    *********************************************************************************/

    /**
     * This method will check if the class use the traits that are need to use
     * this class
     *
     * @return void
     */
    public function testUseTraits()
    {
        $reflectionAppliedStatistics = new ReflectionClass(AppliedStatistics::class);
        $this->assertContains(
            'drdhnrq\PhpAppliedStatistics\Traits\Helpers',
            $reflectionAppliedStatistics->getTraitNames(),
            'The trait Helper isn\'t being used in the class AppliedStatistics'
        );
    }

    /**
     * This method will verifies if the properties and constants are defined
     * in the class
     *
     * @return void
     */
    public function testPropertiesExists(): void
    {
        $reflectionAppliedStatistics = new ReflectionClass(AppliedStatistics::class);
        // DEFAULT_DECIMAL_PLACES
        $this->assertArrayHasKey(
            'DEFAULT_DECIMAL_PLACES',
            $reflectionAppliedStatistics->getConstants(),
            'The constant DEFAULT_DECIMAL_PLACES doesn\'t exist in the class AppliedStatistics'
        );

        $appliedStatistics =  new AppliedStatistics();

        // decimalPlaces
        $this->assertTrue(
            property_exists($appliedStatistics, 'decimalPlaces'),
            'The decimalPlaces property doesn\'t exist in the class AppliedStatistics'
        );
    }

    /**
     * This method will check if the methods exist in the class
     *
     * @return void
     */
    public function testMethodsExists(): void
    {
        $appliedStatistics =  new AppliedStatistics();

        // quantitativeVariables()
        $this->assertTrue(
            method_exists($appliedStatistics, 'quantitativeVariables'),
            'The quantitativeVariables method doesn\'t exist in the class AppliedStatistics'
        );

        // quantitativeVariablesIntervalClass()
        $this->assertTrue(
            method_exists($appliedStatistics, 'quantitativeVariablesIntervalClass'),
            'The quantitativeVariablesIntervalClass method doesn\'t exist in the class AppliedStatistics'
        );

        // qualitativeVariables()
        $this->assertTrue(
            method_exists($appliedStatistics, 'qualitativeVariables'),
            'The qualitativeVariables method doesn\'t exist in the class AppliedStatistics'
        );
    }

    /**
     * This test will verifies if the class is being intance the correct
     * way when the arguments are provide or no to constructor method
     *
     * @return void
     */
    public function testClassIntance(): void
    {
        $appliedStatistics = new AppliedStatistics();
        // without define decimal places
        $this->assertEquals(5, $appliedStatistics->decimalPlaces);

        // Set decimal places after to instance class
        $appliedStatistics->decimalPlaces = 10;
        $this->assertEquals(10, $appliedStatistics->decimalPlaces);

        // Instance class with argument decimal places
        $appliedStatistics = new AppliedStatistics(2);
        $this->assertEquals(2, $appliedStatistics->decimalPlaces);
    }

    /********************************************************************************
     *
     * METHODS TESTS
     *
    *********************************************************************************/

    /**
     * This test will check if the frequency distribution is calculated when
     * the methods to calculate quantitative variables are called
     *
     * @return void
     */
    public function testCalculateQuantitativeVaribles()
    {
        $appliedStatistics = new AppliedStatistics();

        // Class interval doesn't defined
        $appliedStatistics->decimalPlaces = 5;
        $result = $appliedStatistics->quantitativeVariables(DataProvider::defectiveParts()['data']);
        $this->assertObjectHasAttribute('rows', $result);
        $this->assertObjectHasAttribute('totals', $result);
        $this->assertEquals(3, count($result->rows));

        // Class interval doesn't defined
        $appliedStatistics->decimalPlaces = 2;
        $result = $appliedStatistics->quantitativeVariables(DataProvider::employeesSalary()['data']);
        $this->assertObjectHasAttribute('rows', $result);
        $this->assertObjectHasAttribute('totals', $result);
        $this->assertEquals(7, count($result->rows));

        // Class interval defined
        $appliedStatistics->decimalPlaces = 10;
        $result = $appliedStatistics->quantitativeVariablesIntervalClass(DataProvider::employeesSalary()['data'], 130.00);
        $this->assertObjectHasAttribute('rows', $result);
        $this->assertObjectHasAttribute('totals', $result);
        $this->assertEquals(7, count($result->rows));
    }

    /**
     * This test will check if the frequency distribution is calcualted when
     * the method to calculate qualitative frequencies is called
     *
     * @return void
     */
    public function testCalculateQualitativeVariables()
    {
        $appliedStatistics = new AppliedStatistics();

        // Without ordered variables
        $appliedStatistics->decimalPlaces = 5;
        $result = $appliedStatistics->qualitativeVariables(DataProvider::civilStatusPeople()['data']);
        $this->assertObjectHasAttribute('rows', $result);
        $this->assertObjectHasAttribute('totals', $result);
        $this->assertEquals(4, count($result->rows));

        // Ordered variables
        $appliedStatistics->decimalPlaces = 5;
        $result = $appliedStatistics->qualitativeVariables(
            DataProvider::civilStatusPeople()['data'],
            ['solteiro', 'casado', 'viúvo', 'separado']
        );
        $this->assertObjectHasAttribute('rows', $result);
        $this->assertObjectHasAttribute('totals', $result);
        $this->assertEquals(4, count($result->rows));
    }
}