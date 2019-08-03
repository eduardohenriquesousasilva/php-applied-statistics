<?php

include __DIR__ . '../../../Data/DataProvider.php';

use PHPUnit\Framework\TestCase;
use drdhnrq\PhpAppliedStatistics\FrequencyDistribution;
use drdhnrq\PhpAppliedStatistics\Exceptions\FrequencyNotDefined;

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
     * Tests INSTANCE CLASS
     *
    *********************************************************************************/

    /**
     * This test will verify if the class is using the default decimal places
     * constant when the class instance doesn't provide the decimal places argument
     * @return void
     */
    public function testExpectedClassUseDecimalPlacesConstant(): void
    {
        $frequencyDistribution = new FrequencyDistribution();
        $this->assertEquals(
            5,
            $frequencyDistribution->decimalPlaces,
            'The class was instanced none argument decimal places but it doesn\'t using the default decimal places constant'
        );
    }

    /**
     * This test will verify if the class is using the value of the decimal
     * place that was provided when the class was instantiated
     * @return void
     */
    public function testExpectedClassUseTheDecimalPlacesArgumentProvided(): void
    {
        $frequencyDistribution = new FrequencyDistribution([], 3);
        $this->assertEquals(3, $frequencyDistribution->decimalPlaces);

        $frequencyDistribution = new FrequencyDistribution([], 1);
        $this->assertEquals(1, $frequencyDistribution->decimalPlaces);
    }

    /**
     * This test will verify if the data property is empty when the data
     * argument wasn't provided to instantiate the class
     * @return void
     */
    public function testExpectedDataEmptyWhenDataArentProvided(): void
    {
        $frequencyDistribution = new FrequencyDistribution();
        $this->assertEmpty($frequencyDistribution->data);
    }

    /**
     * This test will verify if the data property isn't empty when the data
     * argument was provided to instantiate the class
     * @return void
     */
    public function testExpectedDataisntEmptyWhenDataArentProvided(): void
    {
        $frequencyDistribution = new FrequencyDistribution([1, 3, 2]);
        $this->assertNotEmpty($frequencyDistribution->data);
        $this->assertContains(1, $frequencyDistribution->data);
        $this->assertContains(2, $frequencyDistribution->data);
    }

    /*********************************************************************************
     *
     * Test CLASS METHODS
     *
    *********************************************************************************/

    /**
     * This test will verify if the data are being ordered when the method sortData is called.
     * @return void
     */
    public function testExpectedOrderedDataWhenSortDataMethodIsCalled(): void
    {
        $defectiveParts = DataProvider::defectiveParts();
        $frequencyDistribution =  new FrequencyDistribution($defectiveParts['data']);
        $dataOrdered = $frequencyDistribution->sortData();

        $this->assertCount(30, $frequencyDistribution->data);
        $this->assertEquals($defectiveParts['ordered'], $dataOrdered);
        $this->assertEquals(0, $dataOrdered[0]);
        $this->assertEquals(1, $dataOrdered[14]);
        $this->assertEquals(2, $dataOrdered[25]);
    }

    /**
     * This test will verify if the variables that the data contains are being
     * defined when the method setVariablesFrequency is called
     * @return void
     */
    public function testExpectedSetVariablesWhenMethodIsCalled(): void
    {
        $defectiveParts = DataProvider::defectiveParts();
        $frequencyDistribution = new FrequencyDistribution($defectiveParts['data']);
        $frequencies = $frequencyDistribution->setVariablesFrequency();

        $this->assertCount(3, $frequencies);
        $this->assertEquals(0, $frequencies[0]->variable);
        $this->assertEquals(1, $frequencies[1]->variable);
        $this->assertEquals(2, $frequencies[2]->variable);
    }

    /**
     * This test will verify if the frequencies of the variables are being
     * defined when the method setFrequencies is called
     * @return void
     */
    public function testExpectedSetFrequenciesWhenMethodIsCalled(): void
    {
        $defectiveParts = DataProvider::defectiveParts();
        $frequencyDistribution = new FrequencyDistribution($defectiveParts['data']);

        $frequencyDistribution->setVariablesFrequency();
        $frequencies = $frequencyDistribution->setFrequencies();

        $this->assertCount(3, $frequencies);
        $this->assertEquals(5, $frequencies[2]->frequency);
        $this->assertEquals(11, $frequencies[1]->frequency);
        $this->assertEquals(14, $frequencies[0]->frequency);
    }

    /**
     * This test will verify if the frequencies of the variables are being
     * defined when the method setRelativeFrequencies is called
     * @return void
     */
    public function testExpectedSetRelativeFrequenciesWhenMethodIsCalled(): void
    {
        $defectiveParts = DataProvider::defectiveParts();
        $frequencyDistribution = new FrequencyDistribution($defectiveParts['data'], 4);

        $frequencyDistribution->setVariablesFrequency();
        $frequencyDistribution->setFrequencies();
        $frequencies = $frequencyDistribution->setRelativeFrequencies();

        $this->assertCount(3, $frequencies);
        $this->assertEquals(0.1667, $frequencies[2]->relativeFrequency);
        $this->assertEquals(0.3667, $frequencies[1]->relativeFrequency);
        $this->assertEquals(0.4667, $frequencies[0]->relativeFrequency);
    }

    /**
     * This test verifies if the exception FrequencyNotDefine happen when the
     * method set relative frequency is called before to define the frequencies
     *
     * @return void
     */
    public function testExcpectedExceptionFrequencyNotDefinedWhenSetRelativeFrequencyisCalled(): void
    {
        $this->expectException(FrequencyNotDefined::class);

        $defectiveParts = DataProvider::defectiveParts();
        $frequencyDistribution = new FrequencyDistribution($defectiveParts['data']);
        $frequencyDistribution->setRelativeFrequencies();
    }
}