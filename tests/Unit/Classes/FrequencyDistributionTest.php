<?php

include __DIR__ . '../../../Data/DataProvider.php';

use PHPUnit\Framework\TestCase;
use drdhnrq\PhpAppliedStatistics\FrequencyDistribution;
use drdhnrq\PhpAppliedStatistics\Exceptions\VariableNotDefined;
use drdhnrq\PhpAppliedStatistics\Exceptions\FrequencyNotDefined;
use drdhnrq\PhpAppliedStatistics\Exceptions\AccumulateRelativeFrequency;
use drdhnrq\PhpAppliedStatistics\Exceptions\RelativeFrequencyNotDefined;
use drdhnrq\PhpAppliedStatistics\Exceptions\AccumulatePercentRelativeFrequency;
use drdhnrq\PhpAppliedStatistics\Exceptions\PercentRelativeFrequencyNotDefined;

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

    /**
     * This test will verify if the totals property exists in the class
     * @return void
     */
    public function testExpectedExistPropertyTotals(): void
    {
        $frequencyDistribution = new FrequencyDistribution();
        $this->assertTrue(
            property_exists($frequencyDistribution, 'totals'),
            'The totals property doesn\'t exist in the class Frequency Distribution'
        );
    }

    /**
     * This test will verify if the results property exists in the class
     * @return void
     */
    public function testExpectedExistPropertyResults(): void
    {
        $frequencyDistribution = new FrequencyDistribution();
        $this->assertTrue(
            property_exists($frequencyDistribution, 'results'),
            'The results property doesn\'t exist in the class Frequency Distribution'
        );
    }

    /********************************************************************************
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

    /**
     * This test will verify if setTotals() method exists in the class
     * @return void
     */
    public function testExpectedExistSetTotalsMethod(): void
    {
        $frequencyDistribution = new FrequencyDistribution();
        $this->assertTrue(
            method_exists($frequencyDistribution, 'setTotals'),
            'The setTotals() method doesn\'t exist in the class Frequency Distribution'
        );
    }

    /**
     * This test will verify if setResults() method exists in the class
     * @return void
     */
    public function testExpectedExistSetResultsMethod(): void
    {
        $frequencyDistribution = new FrequencyDistribution();
        $this->assertTrue(
            method_exists($frequencyDistribution, 'setResults'),
            'The setResults() method doesn\'t exist in the class Frequency Distribution'
        );
    }

    /********************************************************************************
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

    /********************************************************************************
     *
     * Test CLASS METHODS
     *
    *********************************************************************************/

    /**
     * This test will verify if the data are being ordered when the method sortData is called.
     * sortData()
     * @return void
     */
    public function testExpectedOrderedDataWhenSortDataMethodIsCalled(): void
    {
        $defectiveParts = DataProvider::defectiveParts();
        $frequencyDistribution =  new FrequencyDistribution($defectiveParts['data']);
        $dataOrdered = $frequencyDistribution->sortData();

        $this->assertCount(30, $frequencyDistribution->data);
        $this->assertEquals(0, $dataOrdered[0]);
        $this->assertEquals(1, $dataOrdered[14]);
        $this->assertEquals(2, $dataOrdered[25]);
    }

    /**
     * This test will verify if the variables that the data contains are being
     * defined when the method setVariablesFrequency is called
     * setVariablesFrequency()
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
     * setFrequencies()
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
     * This test verifies if the exception VariableNotDefined happen when the
     * method set setFrequency is called before to define the frequencies variables
     * setFrequencies()
     * @return void
     */
    public function testExpectedExceptionVariableNotDefinedCalledSetFrequencies(): void
    {
        $this->expectException(VariableNotDefined::class);

        $defectiveParts = DataProvider::defectiveParts();
        $frequencyDistribution = new FrequencyDistribution($defectiveParts['data']);
        $frequencyDistribution->setFrequencies();
    }

    /**
     * This test will verify if the relative frequencies of the variables are being
     * defined when the method setRelativeFrequencies is called
     * setRelativeFrequencies()
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
     * This test verifies if the exception FrequencyNotDefined happen when the
     * method set relative frequency is called before to define the frequencies
     * setRelativeFrequencies()
     * @return void
     */
    public function testExpectedExceptionFrequencyNotDefinedCalledSetRelativeFrequencies(): void
    {
        $this->expectException(FrequencyNotDefined::class);

        $defectiveParts = DataProvider::defectiveParts();
        $frequencyDistribution = new FrequencyDistribution($defectiveParts['data']);
        $frequencyDistribution->setRelativeFrequencies();
    }

    /**
     * This test will verify if the percent relative frequencies of the variables
     * are being defined when the method setRelativeFrequencies is called
     * setPercentRelativeFrequencies()
     * @return void
     */
    public function testExpectedSetPercentRelativeFrequenciesWhenMethodIsCalled(): void
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
    }

    /**
     * This test verifies if the exception RelativeFrequencyNotDefined happen when
     * the method set percent relative frequency is called before to define the
     * relative frequencies
     * setPercentRelativeFrequencies()
     * @return void
     */
    public function testExpectedExceptionRelativeFrequencyNotDefinedCalledSetPercentRelativeFrequencies(): void
    {
        $this->expectException(RelativeFrequencyNotDefined::class);

        $defectiveParts = DataProvider::defectiveParts();
        $frequencyDistribution = new FrequencyDistribution($defectiveParts['data']);
        $frequencyDistribution->setPercentRelativeFrequencies();
    }

    /**
     * This test will verify if the accumulate frequencies of the variables are
     * being defined when the method setAccumulateFrequencies is called
     * setAccumulateFrequencies()
     * @return void
     */
    public function testExpectedSetAccumulateFrequenciesWhenMethodIsCalled(): void
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
    }

    /**
     * This test verifies if the exception FrequencyNotDefined happen when the
     * method set accumulate frequency is called before to define the frequencies
     * setAccumulateFrequencies()
     * @return void
     */
    public function testExpectedExceptionFrequencyNotDefinedCalledSetAccumulateFrequencies(): void
    {
        $this->expectException(FrequencyNotDefined::class);

        $defectiveParts = DataProvider::defectiveParts();
        $frequencyDistribution = new FrequencyDistribution($defectiveParts['data']);
        $frequencyDistribution->setAccumulateFrequencies();
    }

    /**
     * This test will verify if the accumulate relative frequencies of the variables
     * are being defined when the method setAccumulateRelativeFrequencies is called
     * setAccumulateRelativeFrequencies()
     * @return void
     */
    public function testExpectedSetAccumulateRelativeFrequenciesWhenMethodIsCalled(): void
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
    }

    /**
     * This test verifies if the exception RelativeFrequencyNotDefined happen when
     * the method set accumulate relative frequency is called before to define the
     * relative frequencies
     * setAccumulateFrequencies()
     * @return void
     */
    public function testExpectedExceptionRelativeFrequencyNotDefinedCalledSetAccumulateRelativeFrequencies(): void
    {
        $this->expectException(RelativeFrequencyNotDefined::class);

        $defectiveParts = DataProvider::defectiveParts();
        $frequencyDistribution = new FrequencyDistribution($defectiveParts['data']);
        $frequencyDistribution->setAccumulateRelativeFrequencies();
    }

    /**
     * This test will verify if the percent accumulate relative frequencies of the
     * variables are being defined when the method setPercentAccumulateRelativeFrequencies
     * is called
     * setPercentAccumulateRelativeFrequencies()
     * @return void
     */
    public function testExpectedSetPercentAccumulateRelativeFrequenciesWhenMethodIsCalled(): void
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
    }

    /**
     * This test verifies if the exception PercentRelativeFrequencyNotDefined happen
     * when the method set percentAccumulateRelativeFrequency is called before to
     * define the percent relative frequencies
     * setPercentAccumulateFrequencies()
     * @return void
     */
    public function testExpectedExceptionPercentRelativeFrequencyNotDefinedCalledSetPercentAccumulateRelativeFrequencies(): void
    {
        $this->expectException(PercentRelativeFrequencyNotDefined::class);

        $defectiveParts = DataProvider::defectiveParts();
        $frequencyDistribution = new FrequencyDistribution($defectiveParts['data']);

        $frequencyDistribution->setVariablesFrequency();
        $frequencyDistribution->setFrequencies();
        $frequencyDistribution->setPercentAccumulateRelativeFrequencies();
    }

    /**
     * This test verifies if the totals value equals the values that got in the
     * calculate the frequency distribution
     * setTotals()
     * @return void
     */
    public function testExpectedSetTotalsWhenMethodIsCalled(): void
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
        $frequencyDistribution->setPercentAccumulateRelativeFrequencies();
        $totals = $frequencyDistribution->setTotals();

        $this->assertEquals(30, $totals->frequency);
        $this->assertEquals(1.0001, $totals->relativeFrequency);
        $this->assertEquals(100.01, $totals->percentRelativeFrequency);
    }

    /**
     * This test verifies if the exception AccumulateRelativeFrequency happen
     * when the method setTotals is called before to
     * define the accumulate relative frequencies
     * setTotals()
     * @return void
     */
    public function testExpectedExceptionWhenAccumulateRelativeFrequencyNotDefinedAndMethodSetTotalsIsCalled()
    {
        $this->expectException(AccumulateRelativeFrequency::class);

        $defectiveParts = DataProvider::defectiveParts();
        $frequencyDistribution = new FrequencyDistribution($defectiveParts['data']);

        $frequencyDistribution->setVariablesFrequency();
        $frequencyDistribution->setFrequencies();
        $frequencyDistribution->setTotals();
    }

    /**
     * This test verifies if the exception AccumulatePercentRelativeFrequency happen
     * when the method setTotals is called before to
     * define the accumulate percent relative frequencies
     * setTotals()
     * @return void
     */
    public function testExpectedExceptionWhenAccumulatePercentRelativeFrequencyNotDefinedAndMethodSetTotalsIsCalled()
    {
        $this->expectException(AccumulatePercentRelativeFrequency::class);

        $defectiveParts = DataProvider::defectiveParts();
        $frequencyDistribution = new FrequencyDistribution($defectiveParts['data']);

        $frequencyDistribution->setVariablesFrequency();
        $frequencyDistribution->setFrequencies();
        $frequencyDistribution->setRelativeFrequencies();
        $frequencyDistribution->setAccumulateRelativeFrequencies();
        $frequencyDistribution->setTotals();
    }

    /**
     * This test verifies if the results is defined when method
     * setResults() is called
     * @return void
     */
    public function testExpectedSetResultsWhenMethodIsCalled(): void
    {
        $defectiveParts = DataProvider::defectiveParts();
        $frequencyDistribution = new FrequencyDistribution($defectiveParts['data']);

        $frequencyDistribution->sortData();
        $frequencyDistribution->setVariablesFrequency();
        $frequencyDistribution->setFrequencies();
        $frequencyDistribution->setRelativeFrequencies();
        $frequencyDistribution->setPercentRelativeFrequencies();
        $frequencyDistribution->setAccumulateFrequencies();
        $frequencyDistribution->setAccumulateRelativeFrequencies();
        $frequencyDistribution->setPercentAccumulateRelativeFrequencies();
        $result = $frequencyDistribution->setResults();

        $this->assertObjectHasAttribute('rows', $result);
        $this->assertObjectHasAttribute('totals', $result);

        $expected = (object) [
            'variable' => 0,
            'frequency' => 14,
            'relativeFrequency' => 0.46667,
            'percentRelativeFrequency' => 46.667,
            'accumulateFrequency' => 14,
            'accumulateRelativeFrequency' => 0.46667,
            'accumulatePercentRelativeFrequency' => 46.667,
            'class' => 1,
        ];
        $this->assertEquals($expected, $result->rows[0]);

        $expected = (object) [
            'variable' => 2,
            'frequency' => 5,
            'relativeFrequency' => 0.16667,
            'percentRelativeFrequency' => 16.667,
            'accumulateFrequency' => 30,
            'accumulateRelativeFrequency' => 1.00001,
            'accumulatePercentRelativeFrequency' => 100.001,
            'class' => 1,
        ];
        $this->assertEquals($expected, $result->rows[2]);
    }

    /**
     * This test verifies if the Exception FrequencyNotDefined will be returned
     * when the method setResults() is called and the frequencies weren't defined
     * @return void
     */
    public function testExpectedExceptionWhenFrequencyIsNotDefindAndMethodSetResultsIsCalled(): void
    {
        $this->expectException(FrequencyNotDefined::class);

        $defectiveParts = DataProvider::defectiveParts();
        $frequencyDistribution = new FrequencyDistribution($defectiveParts['data']);
        $frequencyDistribution->setResults();
    }
}