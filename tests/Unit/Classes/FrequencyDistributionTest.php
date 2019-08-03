<?php

include __DIR__ . '../../../Data/DataProvider.php';

use PHPUnit\Framework\TestCase;
use drdhnrq\PhpAppliedStatistics\FrequencyDistribution;

class FrequencyDistributionTest extends TestCase
{
    /*********************************************************************************
     *
     * Smoke tests EXIST PROPERTIES
     *
    *********************************************************************************/

    /**
     * This test will verify if the constant DEFAULT_DECIMAL_PLACES exists
     * in the class
     * @return void
     */
    public function testExpectedExistConstantDefaultDecimalPlaces(): void
    {
        $frequencyDistribution = new ReflectionClass(FrequencyDistribution::class);
        $this->assertArrayHasKey(
            'DEFAULT_DECIMAL_PLACES',
            $frequencyDistribution->getConstants(),
            'The DEFAULT_DECIMAL_PLACES constant doesn\'t exists in the class Frequency Distribution'
        );
    }

    /**
     * This test will verify if the decimal places property exists in this class
     * @return void
     */
    public function testExpectedExistPropertyDecimalPlaces(): void
    {
        $frequencyDistribution = new FrequencyDistribution();
        $this->assertTrue(
            property_exists($frequencyDistribution, 'decimalPlaces'),
            'The decimal places property doesn\'t exist in the class Frequency Distribution'
        );
    }

    /**
     * This test will verify if the data property exists in the class
     * @return void
     */
    public function testExpectedExistPropertyData(): void
    {
        $frequencyDistribution = new FrequencyDistribution();
        $this->assertTrue(
            property_exists($frequencyDistribution, 'data'),
            'The data property doesn\'t exist in the class Frequency Distribution'
        );
    }

    /**
     * This test will verify if the frequencies property exists in the class
     * @return void
     */
    public function testExpectedExistPropertyFrequencies(): void
    {
        $frequencyDistribution = new FrequencyDistribution();
        $this->assertTrue(
            property_exists($frequencyDistribution, 'frequencies'),
            'The frequencies property doesn\'t exist in the class Frequency Distribution'
        );
    }

    /*********************************************************************************
     *
     * Smoke tests EXIST METHODS
     *
    *********************************************************************************/

    /**
     * This test will verify if the sortData() method exists in the class
     * @return void
     */
    public function testExpectedExistSortDataMethod(): void
    {
        $frequencyDistribution = new FrequencyDistribution();
        $this->assertTrue(
            method_exists($frequencyDistribution, 'sortData'),
            'The sortData() method doesn\'t exist in the class Frequency Distribution'
        );
    }

    /**
     * The test will verify if setVariablesfrequency() method exists in the class
     * @return void
     */
    public function testExpectedExistSetVariablesFrequencyMethod(): void
    {
        $frequencyDistribution = new FrequencyDistribution();
        $this->assertTrue(
            method_exists($frequencyDistribution, 'setVariablesFrequency'),
            'The setVariablesFrequency() method doesn\'t exist in the class Frequency Distribution'
        );
    }

    /**
     * This test will verify if the setFrequencies() method exists in the class
     * @return void
     */
    public function testExpectedExistSetFrequenciesMethod(): void
    {
        $frequencyDistribution = new FrequencyDistribution();
        $this->assertTrue(
            method_exists($frequencyDistribution, 'setFrequencies'),
            'The setFrequencies() method doesn\'t exits in the class Frequency Distribution'
        );
    }

    /**
     * This test will verify if setRelativeFrequencies() method exists in the class
     * @return void
     */
    public function testExpectedExistSetRelativeFrequenciesMethod(): void
    {
        $frequencyDistribution = new FrequencyDistribution();
        $this->assertTrue(
            method_exists($frequencyDistribution, 'setRelativeFrequencies'),
            'The setRelativeFrequencies() method doesn\'t exist in the class Frequency Distribution'
        );
    }

    /**
     * This test will verify if setPercentRelativeFrequencies() method exists in the class
     * @return void
     */
    public function testExpectedExistSetPercentRelativeFrequenciesMethod(): void
    {
        $frequencyDistribution = new FrequencyDistribution();
        $this->assertTrue(
            method_exists($frequencyDistribution, 'setPercentRelativeFrequencies'),
            'The setPercentRelativeFrequencies() method doesn\'t exist in the class Frequency Distribution'
        );
    }

    /**
     * This test will verify if setAccumulateFrequencies() method exists in the class
     * @return void
     */
    public function testExpectedExistSetAccumulateFrequenciesMethod(): void
    {
        $frequencyDistribution = new FrequencyDistribution();
        $this->assertTrue(
            method_exists($frequencyDistribution, 'setAccumulateFrequencies'),
            'The setAccumulateFrequencies() method doesn\'t exist in the class Frequency Distribution'
        );
    }

    /**
     * This test will verify if setAccumulateRelativeFrequencies() method exists in the class
     * @return void
     */
    public function testExpectedExistSetAccumulateRelativeFrequenciesMethod(): void
    {
        $frequencyDistribution = new FrequencyDistribution();
        $this->assertTrue(
            method_exists($frequencyDistribution, 'setAccumulateRelativeFrequencies'),
            'The setAccumulateRelativeFrequencies() method doesn\'t exist in the class Frequency Distribution'
        );
    }

    /**
     * This test will verify if setPercentAccumulateRelativeFrequencies() method exists in the class
     * @return void
     */
    public function testExpectedExistSetPercentAccumulateRelativeFrequenciesMethod(): void
    {
        $frequencyDistribution = new FrequencyDistribution();
        $this->assertTrue(
            method_exists($frequencyDistribution, 'setPercentAccumulateRelativeFrequencies'),
            'The setPercentAccumulateRelativeFrequencies() method doesn\'t exist in the class Frequency Distribution'
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
     */
    // public function testExpetedInstanceClassUseConstantDefaultDecimalPlaces()
    // {
    //     $frequencyDistribution = new FrequencyDistribution();
    //     $this->assertEquals(5, $frequencyDistribution->decimalPlaces);
    // }

    /**
     * This test verifies if de decimal places is defined with the value that
     * was passed as argument to instantiate the class
     */
    // public function testExpectedInstanceClassUseDecimalPlacesPassedAsArgumentConstructor()
    // {
    //     $frequencyDistribution = new FrequencyDistribution([], 3);
    //     $this->assertEquals(3, $frequencyDistribution->decimalPlaces);


    //     $frequencyDistribution = new FrequencyDistribution([], 1);
    //     $this->assertEquals(1, $frequencyDistribution->decimalPlaces);
    // }

    /**
     * this test verfies if the data property is empty when the data
     * argument isnt passed in the constructor
     */
    // public function testExpectedDataIsEmptyIfClassInstanceWithouPassData()
    // {
    //     $frequencyDistribution = new FrequencyDistribution();
    //     $this->assertEmpty($frequencyDistribution->data);
    // }

    /**
     * This test verifies if the data is being defined whent it is passed
     * as argument constructor in the class
     */
    // public function testExpectedDataIsnotEmptyIfClassInstanceWithArgumentData()
    // {
    //     $frequencyDistribution = new FrequencyDistribution([1, 3, 2]);
    //     $this->assertNotEmpty($frequencyDistribution->data);
    //     $this->assertContains(1, $frequencyDistribution->data);
    //     $this->assertContains(2, $frequencyDistribution->data);
    // }

    /*********************************************************************************
     *
     * Test Class Methods
     *
    *********************************************************************************/

    /**
     * This test expected that the data of the class will be ordered crescent shape
     * (sortData)
     */
    // public function testExpectedDataOrderedWhenCallSortDataMethod()
    // {
    //     $defectiveParts = DataProvider::defectiveParts();
    //     $frequencyDistribution =  new FrequencyDistribution($defectiveParts);
    //     $this->assertCount(30, $frequencyDistribution->data);

    //     $frequencyDistribution->sortData();
    //     $this->assertEquals(1, $frequencyDistribution->data[0]);
    //     $this->assertEquals(2, $frequencyDistribution->data[1]);
    //     $this->assertEquals(3, $frequencyDistribution->data[2]);
    //     $this->assertEquals(4, $frequencyDistribution->data[3]);
    //     $this->assertEquals(15, $frequencyDistribution->data[4]);
    // }

    /**
     * This test verifies if the variables were set when the method setFrequencyVariables
     * is called, its expected that the variables to be setted
     * (setFrequencyVariables)
     *
     * @return void
     */
    // public function testExpectedFrequencyVariablesDefinedWhenCallSetVariablesMethod()
    // {
    //     $frequencyDistribution =  new FrequencyDistribution([4, 1, 3, 2, 3, 4, 4, 1]);
    //     $this->assertCount(8, $frequencyDistribution->data);

    //     $frequencyDistribution->setFrequencyVariables();

    //     $this->assertCount(4, $frequencyDistribution->frequencies);
    //     $this->assertEquals(1, $frequencyDistribution->frequencies[1]->variable);
    //     $this->assertEquals(2, $frequencyDistribution->frequencies[2]->variable);
    //     $this->assertEquals(3, $frequencyDistribution->frequencies[3]->variable);
    //     $this->assertEquals(4, $frequencyDistribution->frequencies[4]->variable);
    // }

    /**
     * This test verifies if the frequencies were set when the method setFrequencies
     * is called, its expetected that the frequencies to be setted
     * (setFrequencies)
     *
     * @return void
     */
    // public function testExpectedFrequencyDefinedWhenCallSetFrequenciesMethod()
    // {
    //     $frequencyDistribution =  new FrequencyDistribution([15, 4, 1, 3, 2, 3, 4, 4, 1]);
    //     $this->assertCount(9, $frequencyDistribution->data);


    //     $frequencyDistribution->setFrequencies();

    //     $this->assertCount(5, $frequencyDistribution->frequencies);

    //     $this->assertEquals(2, $frequencyDistribution->frequencies[1]->frequency);
    //     $this->assertEquals(1, $frequencyDistribution->frequencies[2]->frequency);
    //     $this->assertEquals(2, $frequencyDistribution->frequencies[3]->frequency);
    //     $this->assertEquals(3, $frequencyDistribution->frequencies[4]->frequency);
    //     $this->assertEquals(1, $frequencyDistribution->frequencies[15]->frequency);
    // }
}