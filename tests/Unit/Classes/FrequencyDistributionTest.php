<?php

use PHPUnit\Framework\TestCase;
use drdhnrq\PhpAppliedStatistics\FrequencyDistribution;

class FrequencyDistributionTest extends TestCase
{
    /*********************************************************************************
     *
     * Propeties Exists
     *
    *********************************************************************************/

    /**
     * This test verifies if the constant DEFAULT_DECIMAL_PLACES exists
     * in the class
     *
     * @return void
     */
    public function testExpectedConstantDefaultDecimalPlacesExists()
    {
        $frequencyDistribution = new ReflectionClass(FrequencyDistribution::class);
        $this->assertArrayHasKey('DEFAULT_DECIMAL_PLACES', $frequencyDistribution->getConstants());
    }

    /**
     * This test verifies if the property decimalPlaces exists
     * in the Class
     *
     * @return void
     */
    public function testExpectedPropertyDecimalPlacesExists()
    {
        $frequencyDistribution = new FrequencyDistribution();
        $this->assertTrue(
            property_exists($frequencyDistribution, 'decimalPlaces'),
            'The Class FrequencyDistribution not have property decimalPlaces'
        );
    }

    /**
     * This test verifies if the property data exists
     * in the Class
     *
     * @return void
     */
    public function testExpectedPropertyDataExists()
    {
        $frequencyDistribution = new FrequencyDistribution();
        $this->assertTrue(
            property_exists($frequencyDistribution, 'data'),
            'The Class FrequencyDistribution not have property data'
        );
    }

    /**
     * This test verifies if the property frequencies exists
     * in the Class
     *
     * @return void
     */
    public function testExpectedPropertyFrequenciesExists()
    {
        $frequencyDistribution = new FrequencyDistribution();
        $this->assertTrue(
            property_exists($frequencyDistribution, 'frequencies'),
            'The Class FrequencyDistribution not have property frequencies'
        );
    }

    /*********************************************************************************
     *
     * Methods Exists
     *
    *********************************************************************************/

    /**
     * This test verifies if the method sortData exists in the Class
     *
     * @return void
     */
    public function testExpectedThatSortDataMethodExists()
    {
        $frequencyDistribution = new FrequencyDistribution();
        $this->assertTrue(
            method_exists($frequencyDistribution, 'sortData'),
            'The Class FrequencyDistribution not have method sortData'
        );
    }

    /**
     * This test verifies if the method setFrequencyVariables exists in the Class
     *
     * @return void
     */
    public function testExpectedThatSetVariablesFrequencyMethodExists()
    {
        $frequencyDistribution = new FrequencyDistribution();
        $this->assertTrue(
            method_exists($frequencyDistribution, 'setFrequencyVariables'),
            'The Class FrequencyDistribution not have method setFrequencyVariables'
        );
    }

    /**
     * This test verifies if the method setFrequencies exists in the Class
     *
     * @return void
     */
    public function testExpectedThatSetFrequenciesMethodExists()
    {
        $frequencyDistribution = new FrequencyDistribution();
        $this->assertTrue(
            method_exists($frequencyDistribution, 'setFrequencies'),
            'The Class FrequencyDistribution not have method setFrequencies'
        );
    }

    /*********************************************************************************
     *
     * Instanciate Class
     *
    *********************************************************************************/

    /**
     * This test verifies if the decimal places is defined the value of
     * constant DEFAULT_DECIMAL_PLACES when the class FrequencyDistribution
     * is instance without pass default places argument
     *
     * @return void
     */
    public function testExpetedInstanceClassUseConstantDefaultDecimalPlaces()
    {
        $frequencyDistribution = new FrequencyDistribution();
        $this->assertEquals(5, $frequencyDistribution->decimalPlaces);
    }

    /**
     * This test verifies if de decimal places is defined with the value that
     * was passed as argument to instantiate the class
     *
     * @return void
     */
    public function testExpectedInstanceClassUseDecimalPlacesPassedAsArgumentConstructor()
    {
        $frequencyDistribution = new FrequencyDistribution([], 3);
        $this->assertEquals(3, $frequencyDistribution->decimalPlaces);


        $frequencyDistribution = new FrequencyDistribution([], 1);
        $this->assertEquals(1, $frequencyDistribution->decimalPlaces);
    }

    /**
     * this test verfies if the data property is empty when the data
     * argument isnt passed in the constructor
     *
     * @return void
     */
    public function testExpectedDataIsEmptyIfClassInstanceWithouPassData()
    {
        $frequencyDistribution = new FrequencyDistribution();
        $this->assertEmpty($frequencyDistribution->data);
    }

    /**
     * This test verifies if the data is being defined whent it is passed
     * as argument constructor in the class
     *
     * @return void
     */
    public function testExpectedDataIsnotEmptyIfClassInstanceWithArgumentData()
    {
        $frequencyDistribution = new FrequencyDistribution([1, 3, 2]);
        $this->assertNotEmpty($frequencyDistribution->data);
        $this->assertContains(1, $frequencyDistribution->data);
        $this->assertContains(2, $frequencyDistribution->data);
    }

    /*********************************************************************************
     *
     * Test Class Methods
     *
    *********************************************************************************/

    /**
     * This test expected that the data of the class will be ordered crescent shape
     * (sortData)
     *
     * @return void
     */
    public function testExpectedDataOrderedWhenCallSortDataMethod()
    {
        $frequencyDistribution =  new FrequencyDistribution([15, 4, 1, 3, 2]);
        $this->assertCount(5, $frequencyDistribution->data);

        $frequencyDistribution->sortData();
        $this->assertEquals(1, $frequencyDistribution->data[0]);
        $this->assertEquals(2, $frequencyDistribution->data[1]);
        $this->assertEquals(3, $frequencyDistribution->data[2]);
        $this->assertEquals(4, $frequencyDistribution->data[3]);
        $this->assertEquals(15, $frequencyDistribution->data[4]);
    }

    /**
     * This test verifies if the variables were set when the method setFrequencyVariables
     * is called, its expected that the variables to be setted
     * (setFrequencyVariables)
     *
     * @return void
     */
    public function testExpectedFrequencyVariablesDefinedWhenCallSetVariablesMethod()
    {
        $frequencyDistribution =  new FrequencyDistribution([4, 1, 3, 2, 3, 4, 4, 1]);
        $this->assertCount(8, $frequencyDistribution->data);

        $frequencyDistribution->setFrequencyVariables();

        $this->assertCount(4, $frequencyDistribution->frequencies);
        $this->assertEquals(1, $frequencyDistribution->frequencies[1]->variable);
        $this->assertEquals(2, $frequencyDistribution->frequencies[2]->variable);
        $this->assertEquals(3, $frequencyDistribution->frequencies[3]->variable);
        $this->assertEquals(4, $frequencyDistribution->frequencies[4]->variable);
    }

    /**
     * This test verifies if the frequencies were set when the method setFrequencies
     * is called, its expetected that the frequencies to be setted
     * (setFrequencies)
     *
     * @return void
     */
    public function testExpectedFrequencyDefinedWhenCallSetFrequenciesMethod()
    {
        $frequencyDistribution =  new FrequencyDistribution([15, 4, 1, 3, 2, 3, 4, 4, 1]);
        $this->assertCount(9, $frequencyDistribution->data);


        $frequencyDistribution->setFrequencies();

        $this->assertCount(5, $frequencyDistribution->frequencies);

        $this->assertEquals(2, $frequencyDistribution->frequencies[1]->frequency);
        $this->assertEquals(1, $frequencyDistribution->frequencies[2]->frequency);
        $this->assertEquals(2, $frequencyDistribution->frequencies[3]->frequency);
        $this->assertEquals(3, $frequencyDistribution->frequencies[4]->frequency);
        $this->assertEquals(1, $frequencyDistribution->frequencies[15]->frequency);
    }
}