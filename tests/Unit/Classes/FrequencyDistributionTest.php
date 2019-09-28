<?php

use PHPUnit\Framework\TestCase;
use drdhnrq\PhpAppliedStatistics\FrequencyDistribution;
use drdhnrq\PhpAppliedStatistics\Exceptions\VariableNotDefined;
use drdhnrq\PhpAppliedStatistics\Exceptions\FrequencyNotDefined;
use drdhnrq\PhpAppliedStatistics\Exceptions\AccumulateRelativeFrequency;
use drdhnrq\PhpAppliedStatistics\Exceptions\RelativeFrequencyNotDefined;
use drdhnrq\PhpAppliedStatistics\Exceptions\AccumulatePercentRelativeFrequency;
use drdhnrq\PhpAppliedStatistics\Exceptions\DataIsEmpty;
use drdhnrq\PhpAppliedStatistics\Exceptions\PercentRelativeFrequencyNotDefined;

class FrequencyDistributionTest extends TestCase
{
    /********************************************************************************
     *
     * SMOKE TESTS
     *
    *********************************************************************************/

    /**
     * This test verifies if the traits are using in the class
     *
     * @return void
     */
    public function testUseTraits()
    {
        $reflectionAppliedStatistics = new ReflectionClass(FrequencyDistribution::class);

        // Use trait Helpers
        $this->assertContains(
            'drdhnrq\PhpAppliedStatistics\Traits\Helpers',
            $reflectionAppliedStatistics->getTraitNames(),
            'The trait Helpers isn\'t being used in the class AppliedStatistics'
        );

        // Use trait ValidationRequirements
        $this->assertContains(
            'drdhnrq\PhpAppliedStatistics\Traits\ValidationRequirements',
            $reflectionAppliedStatistics->getTraitNames(),
            'The trait ValidationRequirements isn\'t being used in the class AppliedStatistics'
        );

        // Use trait DefaultValidations
        $this->assertContains(
            'drdhnrq\PhpAppliedStatistics\Traits\DefaultValidations',
            $reflectionAppliedStatistics->getTraitNames(),
            'The trait DefaultValidations isn\'t being used in the class AppliedStatistics'
        );
    }

    /**
     * This test verifies if the properties were declared in the class
     *
     * @return void
     */
    public function testPropertiesExist()
    {
        $frequencyDistributionReflectionClass = new ReflectionClass(FrequencyDistribution::class);
        $frequencyDistribution = new FrequencyDistribution();

        // Check if the DEFAULT_DECIMAL_PLACES constant exist in the class
        $this->assertArrayHasKey(
            'DEFAULT_DECIMAL_PLACES',
            $frequencyDistributionReflectionClass->getConstants(),
            'The DEFAULT_DECIMAL_PLACES constant doesn\'t exists in the class Frequency Distribution'
        );

        // decimalPlaces
        $this->assertTrue(
            property_exists($frequencyDistribution, 'decimalPlaces'),
            'The decimal places property doesn\'t exist in the class Frequency Distribution'
        );

        // data
        $this->assertTrue(
            property_exists($frequencyDistribution, 'data'),
            'The data property doesn\'t exist in the class Frequency Distribution'
        );

        // frequencies
        $this->assertTrue(
            property_exists($frequencyDistribution, 'frequencies'),
            'The frequencies property doesn\'t exist in the class Frequency Distribution'
        );
    }

    /**
     * This test verifies if the methods were declared in the class
     *
     * @return void
     */
    public function testMethodsExist()
    {
        $frequencyDistribution = new FrequencyDistribution();

        // sortData()
        $this->assertTrue(
            method_exists($frequencyDistribution, 'sortData'),
            'The sortData() method doesn\'t exist in the class Frequency Distribution'
        );

        // setVariablesFrequency()
        $this->assertTrue(
            method_exists($frequencyDistribution, 'setVariablesFrequency'),
            'The setVariablesFrequency() method doesn\'t exist in the class Frequency Distribution'
        );

        // setFrequencies()
        $this->assertTrue(
            method_exists($frequencyDistribution, 'setFrequencies'),
            'The setFrequencies() method doesn\'t exits in the class Frequency Distribution'
        );

        // setRelativeFrequencies()
        $this->assertTrue(
            method_exists($frequencyDistribution, 'setRelativeFrequencies'),
            'The setRelativeFrequencies() method doesn\'t exist in the class Frequency Distribution'
        );

        // setPercentRelativeFrequencies()
        $this->assertTrue(
            method_exists($frequencyDistribution, 'setPercentRelativeFrequencies'),
            'The setPercentRelativeFrequencies() method doesn\'t exist in the class Frequency Distribution'
        );

        // setAccumulateFrequencies()
        $this->assertTrue(
            method_exists($frequencyDistribution, 'setAccumulateFrequencies'),
            'The setAccumulateFrequencies() method doesn\'t exist in the class Frequency Distribution'
        );

        // setAccumulateRelativeFrequencies()
        $this->assertTrue(
            method_exists($frequencyDistribution, 'setAccumulateRelativeFrequencies'),
            'The setAccumulateRelativeFrequencies() method doesn\'t exist in the class Frequency Distribution'
        );

        // setPercentAccumulateRelativeFrequencies()
        $this->assertTrue(
            method_exists($frequencyDistribution, 'setPercentAccumulateRelativeFrequencies'),
            'The setPercentAccumulateRelativeFrequencies() method doesn\'t exist in the class Frequency Distribution'
        );
    }

    /**
     * This test verifies the different way to instantiate the class
     *
     * @return void
     */
    public function testIntanceClass()
    {
        // When instantiated class without decimal places
        $frequencyDistribution = new FrequencyDistribution();
        $this->assertEquals(
            5,
            $frequencyDistribution->decimalPlaces,
            'The class was instanced none argument decimal places but it doesn\'t using the default decimal places constant'
        );

        // instantiating class prividing decimal places
        $frequencyDistribution = new FrequencyDistribution([], 3);
        $this->assertEquals(3, $frequencyDistribution->decimalPlaces);

        // Instantiating class without data to calculate
        $this->assertEmpty($frequencyDistribution->data);

        // Instantiating class providing data
        $frequencyDistribution = new FrequencyDistribution([1, 3, 2]);
        $this->assertNotEmpty($frequencyDistribution->data);
        $this->assertContains(1, $frequencyDistribution->data);
        $this->assertContains(2, $frequencyDistribution->data);
    }

    /********************************************************************************
     *
     * METHODS TESTS
     *
    *********************************************************************************/

    /**
     * This test verifies if the data is ordered when called method and test if
     * the exception data is empty is returned when the data didn't define
     *
     * @return void
     */
    public function testMethodSortData()
    {
        // Test ordered data
        $defectiveParts = DataProvider::defectiveParts();
        $frequencyDistribution =  new FrequencyDistribution($defectiveParts['data']);
        $dataOrdered = $frequencyDistribution->sortData();
        $this->assertCount(30, $frequencyDistribution->data);
        $this->assertEquals(0, $dataOrdered[0]);
        $this->assertEquals(1, $dataOrdered[14]);
        $this->assertEquals(2, $dataOrdered[25]);

        // Expect exception when data didn't provide
        $this->expectException(DataIsEmpty::class);
        $frequencyDistribution =  new FrequencyDistribution();
        $frequencyDistribution->sortData();
    }

    /**
     * This test verifies if the variables were defined as auto way, but this
     * verifies too if the variables defined when these are provided as an
     * argument in the method
     *
     * @return void
     */
    public function testMethodSetVariablesFrequency()
    {
        // Test verifies if the variables are auto defined
        $defectiveParts = DataProvider::defectiveParts();
        $frequencyDistribution = new FrequencyDistribution($defectiveParts['data']);
        $frequencies = $frequencyDistribution->setVariablesFrequency();
        $this->assertCount(3, $frequencies);
        $this->assertEquals(0, $frequencies[0]->variable);
        $this->assertEquals(1, $frequencies[1]->variable);
        $this->assertEquals(2, $frequencies[2]->variable);

        // Test if the variables defined in the frequency are the provide variables as an argument
        $defectiveParts = DataProvider::civilStatusPeople();
        $frequencyDistribution = new FrequencyDistribution($defectiveParts['data']);
        $frequencies = $frequencyDistribution->setVariablesFrequency(['solteiro', 'casado', 'viúvo', 'separado']);
        $this->assertCount(4, $frequencies);
        $this->assertEquals('solteiro', $frequencies['solteiro']->variable);
        $this->assertEquals('casado', $frequencies['casado']->variable);
        $this->assertEquals('viúvo', $frequencies['viúvo']->variable);
        $this->assertEquals('separado', $frequencies['separado']->variable);
    }

    /**
     * This test verifies if the frequencies were defined when the method is
     * called and verify if the exception is returned when variables didn't define
     *
     * @return void
     */
    public function testMethodSetFrequencies()
    {
        // Caluclate the frequencies of the data
        $defectiveParts = DataProvider::defectiveParts();
        $frequencyDistribution = new FrequencyDistribution($defectiveParts['data']);

        $frequencyDistribution->setVariablesFrequency();
        $frequencies = $frequencyDistribution->setFrequencies();
        $this->assertCount(3, $frequencies);
        $this->assertEquals(5, $frequencies[2]->frequency);
        $this->assertEquals(11, $frequencies[1]->frequency);
        $this->assertEquals(14, $frequencies[0]->frequency);

        // Expect exception when variables didn't define
        $this->expectException(VariableNotDefined::class);
        $defectiveParts = DataProvider::defectiveParts();
        $frequencyDistribution = new FrequencyDistribution($defectiveParts['data']);
        $frequencyDistribution->setFrequencies();
    }

    /**
     * This test verifies if the relative frequencies were defined when the method
     * is called and verify if the exception is returned when frequencies didn't define
     *
     * @return void
     */
    public function testMethodSetRelativeFrequencies()
    {
        // Calculate relative frequencies
        $defectiveParts = DataProvider::defectiveParts();
        $frequencyDistribution = new FrequencyDistribution($defectiveParts['data'], 4);

        $frequencyDistribution->setVariablesFrequency();
        $frequencyDistribution->setFrequencies();
        $frequencies = $frequencyDistribution->setRelativeFrequencies();
        $this->assertCount(3, $frequencies);
        $this->assertEquals(0.1667, $frequencies[2]->relativeFrequency);
        $this->assertEquals(0.3667, $frequencies[1]->relativeFrequency);
        $this->assertEquals(0.4667, $frequencies[0]->relativeFrequency);

        // Expect exception when the frequency didn't defined
        $this->expectException(FrequencyNotDefined::class);
        $defectiveParts = DataProvider::defectiveParts();
        $frequencyDistribution = new FrequencyDistribution($defectiveParts['data']);
        $frequencyDistribution->setRelativeFrequencies();
    }

    /**
     * This test verifies if the percent relative frequencies were defined when the method
     * is called and verify if the exception is returned when relative frequencies didn't define
     *
     * @return void
     */
    public function testMethodSetPercentRelativeFrequencies()
    {
        $defectiveParts = DataProvider::defectiveParts();
        $frequencyDistribution = new FrequencyDistribution($defectiveParts['data'], 4);

        $frequencyDistribution->setVariablesFrequency();
        $frequencyDistribution->setFrequencies();
        $frequencyDistribution->setRelativeFrequencies();
        $frequencies = $frequencyDistribution->setPercentRelativeFrequencies();
        $this->assertCount(3, $frequencies);
        $this->assertEquals(16.67, $frequencies[2]->percentRelativeFrequency);
        $this->assertEquals(36.67, $frequencies[1]->percentRelativeFrequency);
        $this->assertEquals(46.67, $frequencies[0]->percentRelativeFrequency);

        // Expect expcetion when relative frequency didn't define
        $this->expectException(RelativeFrequencyNotDefined::class);
        $defectiveParts = DataProvider::defectiveParts();
        $frequencyDistribution = new FrequencyDistribution($defectiveParts['data']);
        $frequencyDistribution->setPercentRelativeFrequencies();
    }

    /**
     * This test verifies if the accumulate frequencies were defined when the method
     * is called and verify if the exception is returned when frequencies didn't define
     *
     * @return void
     */
    public function testMethodSetAccumulateFrequencies()
    {
        $defectiveParts = DataProvider::defectiveParts();
        $frequencyDistribution = new FrequencyDistribution($defectiveParts['data']);

        $frequencyDistribution->sortData();
        $frequencyDistribution->setVariablesFrequency();
        $frequencyDistribution->setFrequencies();
        $frequencies = $frequencyDistribution->setAccumulateFrequencies();
        $this->assertCount(3, $frequencies);
        $this->assertEquals(14, $frequencies[0]->accumulateFrequency);
        $this->assertEquals(25, $frequencies[1]->accumulateFrequency);
        $this->assertEquals(30, $frequencies[2]->accumulateFrequency);

        // Expect expcetion when frequency didn't define
        $this->expectException(FrequencyNotDefined::class);
        $defectiveParts = DataProvider::defectiveParts();
        $frequencyDistribution = new FrequencyDistribution($defectiveParts['data']);
        $frequencyDistribution->setAccumulateFrequencies();
    }

    /**
     * This test verifies if the accumulate relative frequencies were defined when the method
     * is called and verify if the exception is returned when relative frequencies didn't define
     *
     * @return void
     */
    public function testMethodSetAccumulateRelativeFrequencies()
    {
        $defectiveParts = DataProvider::defectiveParts();
        $frequencyDistribution = new FrequencyDistribution($defectiveParts['data'], 4);

        $frequencyDistribution->sortData();
        $frequencyDistribution->setVariablesFrequency();
        $frequencyDistribution->setFrequencies();
        $frequencyDistribution->setRelativeFrequencies();
        $frequencyDistribution->setAccumulateFrequencies();
        $frequencies = $frequencyDistribution->setAccumulateRelativeFrequencies();
        $this->assertCount(3, $frequencies);
        $this->assertEquals(0.4667, $frequencies[0]->accumulateRelativeFrequency);
        $this->assertEquals(0.8334, $frequencies[1]->accumulateRelativeFrequency);
        $this->assertEquals(1.0001, $frequencies[2]->accumulateRelativeFrequency);

        // Expect exception when relative frequency didn't define
        $this->expectException(RelativeFrequencyNotDefined::class);
        $defectiveParts = DataProvider::defectiveParts();
        $frequencyDistribution = new FrequencyDistribution($defectiveParts['data']);
        $frequencyDistribution->setAccumulateRelativeFrequencies();
    }

    /**
     * This test verifies if the percent accumulate relative frequencies were defined when the method
     * is called and verify if the exception is returned when percent relative frequencies didn't define
     *
     * @return void
     */
    public function testMethodSetPercentAccumulateRelativeFrequencies()
    {
        $defectiveParts = DataProvider::defectiveParts();
        $frequencyDistribution = new FrequencyDistribution($defectiveParts['data'], 4);

        $frequencyDistribution->sortData();
        $frequencyDistribution->setVariablesFrequency();
        $frequencyDistribution->setFrequencies();
        $frequencyDistribution->setRelativeFrequencies();
        $frequencyDistribution->setPercentRelativeFrequencies();
        $frequencyDistribution->setAccumulateFrequencies();
        $frequencyDistribution->setAccumulateRelativeFrequencies();
        $frequencies = $frequencyDistribution->setPercentAccumulateRelativeFrequencies();
        $this->assertCount(3, $frequencies);
        $this->assertEquals(46.67, $frequencies[0]->accumulatePercentRelativeFrequency);
        $this->assertEquals(83.34, $frequencies[1]->accumulatePercentRelativeFrequency);
        $this->assertEquals(100.01, $frequencies[2]->accumulatePercentRelativeFrequency);

        // Expect exception when percent relative frequency didn't define
        $this->expectException(PercentRelativeFrequencyNotDefined::class);
        $defectiveParts = DataProvider::defectiveParts();
        $frequencyDistribution = new FrequencyDistribution($defectiveParts['data']);
        $frequencyDistribution->setVariablesFrequency();
        $frequencyDistribution->setFrequencies();
        $frequencyDistribution->setPercentAccumulateRelativeFrequencies();
    }
}