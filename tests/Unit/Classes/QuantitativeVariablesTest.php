<?php

require_once __DIR__ . '../../../Data/DataProvider.php';

use PHPUnit\Framework\TestCase;
use drdhnrq\PhpAppliedStatistics\FrequencyDistribution;
use drdhnrq\PhpAppliedStatistics\QuantitativeVariables;
use drdhnrq\PhpAppliedStatistics\Exceptions\DataIsEmpty;
use drdhnrq\PhpAppliedStatistics\Exceptions\DataIsnotOrdered;
use drdhnrq\PhpAppliedStatistics\Exceptions\ClassBreaksIsNotDefined;
use drdhnrq\PhpAppliedStatistics\Exceptions\ClassNumberIsNotDefined;
use drdhnrq\PhpAppliedStatistics\Exceptions\BreadthSampleIsNotDefined;
use drdhnrq\PhpAppliedStatistics\Exceptions\IntervalClassIsNotDefined;
use drdhnrq\PhpAppliedStatistics\Exceptions\DescriptionClassInervalIsNotDefined;

class QuantitativeVariablesTest extends TestCase
{
    /********************************************************************************
     *
     * SMOKE TESTS
     *
    *********************************************************************************/

    /**
     * This test verifies if the class extends of class Frequency Distribution
     *
     * @return void
     */
    public function testExtendClassFrequencyDistribution()
    {
        $frequencyDistribution = new FrequencyDistribution();
        $quantitativeVariables = new QuantitativeVariables();

        $this->assertEquals(
            true,
            is_subclass_of($quantitativeVariables, get_class($frequencyDistribution)),
            'This class doesn\'t extends of FrequencyDistribution'
        );
    }

    /**
     * This test verifies if the properties exist in the class
     *
     * @return void
     */
    public function testPropertiesExist()
    {
        $quantitativeVariables = new QuantitativeVariables();

        // classNumber
        $this->assertTrue(
            property_exists($quantitativeVariables, 'classNumber'),
            'The classNumber property doesn\'t exist in the class QuantitativeVariables'
        );

        // breadthSample
        $this->assertTrue(
            property_exists($quantitativeVariables, 'breadthSample'),
            'The breadthSample property doesn\'t exist in the class QuantitativeVariables'
        );

        // intervalClass
        $this->assertTrue(
            property_exists($quantitativeVariables, 'intervalClass'),
            'The intervalClass property doesn\'t exist in the class QuantitativeVariables'
        );

        // classBreaks
        $this->assertTrue(
            property_exists($quantitativeVariables, 'classBreaks'),
            'The classBreaks property doesn\'t exist in the class QuantitativeVariables'
        );
    }

    /**
     * This test verifies if the methods exist in the class
     *
     * @return void
     */
    public function testMethodsExists()
    {
        $quantitativeVariables = new QuantitativeVariables();

        $this->assertTrue(
            method_exists($quantitativeVariables, 'setClassNumber'),
            'The setClassNumber method doesn\'t exist in the class QuantitativeVariables'
        );

        $this->assertTrue(
            method_exists($quantitativeVariables, 'setBreadthSample'),
            'The setBreadthSample method doesn\'t exist in the class QuantitativeVariables'
        );

        $this->assertTrue(
            method_exists($quantitativeVariables, 'setIntervalClass'),
            'The setIntervalClass method doesn\'t exist in the class QuantitativeVariables'
        );

        $this->assertTrue(
            method_exists($quantitativeVariables, 'setClassBreaks'),
            'The setClassBreaks method doesn\'t exist in the class QuantitativeVariables'
        );

        $this->assertTrue(
            method_exists($quantitativeVariables, 'calculateClassIntervalFrequency'),
            'The calculateClassIntervalFrequency method doesn\'t exist in the class QuantitativeVariables'
        );

        $this->assertTrue(
            method_exists($quantitativeVariables, 'calculateSimpleFrequency'),
            'The calculateSimpleFrequency method doesn\'t exist in the class QuantitativeVariables'
        );

        $this->assertTrue(
            method_exists($quantitativeVariables, 'calculate'),
            'The calculate method doesn\'t exist in the class QuantitativeVariables'
        );
    }

    /********************************************************************************
     *
     * METHODS TESTS
     *
    *********************************************************************************/

    /**
     * This test verifies if the method setClassNumber is calculating the right
     * value when called, and verify if the exception is returned when the data
     * didn't provide to calculate the class number
     *
     * @return void
     */
    public function testMethodSetClassNumber()
    {
        // Expect set class number when data was defined
        $quantitativeVariables = new QuantitativeVariables(DataProvider::employeesSalary()['data']);
        $quantitativeVariables->setClassNumber();
        $this->assertEquals(7, $quantitativeVariables->classNumber);

        // Expect Exception when data didn't define
        $this->expectException(DataIsEmpty::class);
        $quantitativeVariables = new QuantitativeVariables();
        $quantitativeVariables->setClassNumber();
    }

    /**
     * This test verifies if the breadth sample is calculated the right value
     * when it is called, and verify if the exceptions are returned when data
     * didn't provide or data didn't ordered
     *
     * @return void
     */
    public function testMethodSetBreadthSample()
    {
        // Test the method when exits data to calculate breadth sample
        $quantitativeVariables = new QuantitativeVariables(DataProvider::employeesSalary()['data']);
        $quantitativeVariables->sortData();
        $quantitativeVariables->setBreadthSample();
        $this->assertEquals(900, $quantitativeVariables->breadthSample);

        // Test exception when data wasn't provide to calculate breadth sample
        $this->expectException(DataIsEmpty::class);
        $quantitativeVariables = new QuantitativeVariables();
        $quantitativeVariables->setBreadthSample();

        // Test exception when the datas wasn't ordered to calculate breadth sample
        $this->expectException(DataIsnotOrdered::class);
        $quantitativeVariables = new QuantitativeVariables(DataProvider::employeesSalary()['data']);
        $quantitativeVariables->setBreadthSample();
    }

    /**
     * This test verifies if the interval class is calculated when the method is
     * called, and verify if the exceptions are returned when breadth sample didn't
     * define or class number didn't define
     *
     * @return void
     */
    public function testMethodSetIntervalClass()
    {
        // Test set interval class in the correct flow
        $quantitativeVariables = new QuantitativeVariables(DataProvider::employeesSalary()['data'], 2);
        $quantitativeVariables->sortData();
        $quantitativeVariables->setClassNumber();
        $quantitativeVariables->setBreadthSample();
        $quantitativeVariables->setIntervalClass();
        $this->assertEquals(128.57, $quantitativeVariables->intervalClass);

        // test exception when the breadth sample didn't define
        $this->expectException(BreadthSampleIsNotDefined::class);
        $quantitativeVariables = new QuantitativeVariables(DataProvider::employeesSalary()['data']);
        $quantitativeVariables->setIntervalClass();

        // Test exception when the class number didn't define
        $this->expectException(ClassNumberIsNotDefined::class);
        $quantitativeVariables = new QuantitativeVariables(DataProvider::employeesSalary()['data']);
        $quantitativeVariables->sortData();
        $quantitativeVariables->setBreadthSample();
        $quantitativeVariables->setIntervalClass();
    }

   /**
    * This test verifies if the classes breaks are define when the method is called,
    * and verify if the exceptions are returned when data didn't define, data didn't
    * order, the class number didn't define or the interval class didn't define
    *
    * @return void
    */
    public function testMethodSetClassBreaks()
    {
        // Test set class breaks in the correct flow
        $quantitativeVariables = new QuantitativeVariables(DataProvider::employeesSalary()['data'], 0);
        $quantitativeVariables->sortData();
        $quantitativeVariables->setClassNumber();
        $quantitativeVariables->setBreadthSample();
        $quantitativeVariables->setIntervalClass();

        $quantitativeVariables->intervalClass = 130.00;
        $classBreaks = $quantitativeVariables->setClassBreaks();

        $this->assertCount(7, $classBreaks);
        $this->assertArrayNotHasKey(0, $classBreaks);
        $this->assertArrayHasKey(1, $classBreaks);
        $this->assertArrayHasKey(7, $classBreaks);

        $expected = (object) [
            'lessLimit' => 950.0,
            'upperLimit' => 1080.0,
            'description' => "950 |-- 1080",
            'class' => 1,
        ];
        $this->assertContainsEquals($expected, $classBreaks);

        $expected = (object) [
            'lessLimit' => 1340.0,
            'upperLimit' => 1470.0,
            'description' => "1340 |-- 1470",
            'class' => 4,
        ];
        $this->assertContainsEquals($expected, $classBreaks);

        $expected = (object) [
            'lessLimit' => 1730.0,
            'upperLimit' => 1860.0,
            'description' => "1730 |-- 1860",
            'class' => 7,
        ];
        $this->assertContainsEquals($expected, $classBreaks);

        // Test exception when data didn't define
        $this->expectException(DataIsEmpty::class);
        $quantitativeVariables = new QuantitativeVariables();
        $quantitativeVariables->setClassBreaks();

        // Test exception when data wasn't ordered
        $this->expectException(DataIsnotOrdered::class);
        $quantitativeVariables = new QuantitativeVariables(DataProvider::employeesSalary()['data']);
        $quantitativeVariables->setClassBreaks();

        // Test exception when the class number didn't define
        $this->expectException(ClassNumberIsNotDefined::class);
        $quantitativeVariables = new QuantitativeVariables(DataProvider::employeesSalary()['data']);
        $quantitativeVariables->sortData();
        $quantitativeVariables->setBreadthSample();
        $quantitativeVariables->setClassBreaks();

        // Test exception when the interval class didn't define
        $this->expectException(IntervalClassIsNotDefined::class);
        $quantitativeVariables = new QuantitativeVariables(DataProvider::employeesSalary()['data']);
        $quantitativeVariables->sortData();
        $quantitativeVariables->setClassNumber();
        $quantitativeVariables->setBreadthSample();
        $quantitativeVariables->setClassBreaks();
    }

    /**
     * This test verifies if the description class interval was defined when the
     * method is called and verifies if the exception class breaks didn't define
     * are being returned when it isn't defined
     *
     * @return void
     */
    public function testMethodSetDescriptionClassIntervalInFrequency()
    {
        // Test in the correct flow
        $quantitativeVariables = new QuantitativeVariables(DataProvider::employeesSalary()['data'], 0);
        $quantitativeVariables->sortData();
        $quantitativeVariables->setClassNumber();
        $quantitativeVariables->setBreadthSample();
        $quantitativeVariables->setIntervalClass();

        $quantitativeVariables->intervalClass = 130.00;
        $quantitativeVariables->setClassBreaks();
        $frequencies = $quantitativeVariables->setDescriptionClasIntervalInFrequency();

        $this->assertCount(7, $frequencies);

        $expected = (object) [
            'descriptionClassInteval' => "950 |-- 1080",
        ];
        $this->assertContainsEquals($expected, $frequencies);

        $expected = (object) [
            'descriptionClassInteval' => "1340 |-- 1470",
        ];
        $this->assertContainsEquals($expected, $frequencies);

        $expected = (object) [
            'descriptionClassInteval' => "1730 |-- 1860",
        ];
        $this->assertContainsEquals($expected, $frequencies);

        // Test exception when the class breaks didn't define
        $this->expectException(ClassBreaksIsNotDefined::class);
        $quantitativeVariables = new QuantitativeVariables(DataProvider::employeesSalary()['data']);
        $quantitativeVariables->sortData();
        $quantitativeVariables->setClassNumber();
        $quantitativeVariables->setBreadthSample();
        $quantitativeVariables->setDescriptionClasIntervalInFrequency();
    }

    /**
     * This test verifies if the frequencies values are right when the method set
     * frequencies by class interval is called, this test verifies too if the
     * exception is returned when data didn't provide, data didn't order,
     * class breaks didn't define and description class interval didn't define
     *
     * @return void
     */
    public function testMethodSetFrequenciesByClassInterval()
    {
        // Test in the correct flow
        $quantitativeVariables = new QuantitativeVariables(DataProvider::employeesSalary()['data'], 0);
        $quantitativeVariables->sortData();
        $quantitativeVariables->setClassNumber();
        $quantitativeVariables->setBreadthSample();
        $quantitativeVariables->setIntervalClass();

        $quantitativeVariables->intervalClass = 130.00;
        $quantitativeVariables->setClassBreaks();
        $quantitativeVariables->setDescriptionClasIntervalInFrequency();
        $frequencies = $quantitativeVariables->setFrequenciesByClassInterval();

        $this->assertCount(7, $frequencies);
        $this->assertEquals(12, $frequencies[1]->frequency);
        $this->assertEquals(8, $frequencies[3]->frequency);
        $this->assertEquals(5, $frequencies[5]->frequency);
        $this->assertEquals(8, $frequencies[7]->frequency);

        // Test exception when data didn't define
        $this->expectException(DataIsEmpty::class);
        $quantitativeVariables = new QuantitativeVariables();
        $quantitativeVariables->setFrequenciesByClassInterval();

        // Test exception when data wasn't ordered
        $this->expectException(DataIsnotOrdered::class);
        $quantitativeVariables = new QuantitativeVariables(DataProvider::employeesSalary()['data']);
        $quantitativeVariables->setFrequenciesByClassInterval();

        // Test Exception when class Breaks didn't define
        $this->expectException(ClassBreaksIsNotDefined::class);
        $quantitativeVariables = new QuantitativeVariables(DataProvider::employeesSalary()['data']);
        $quantitativeVariables->sortData();
        $quantitativeVariables->setClassNumber();
        $quantitativeVariables->setBreadthSample();
        $quantitativeVariables->setFrequenciesByClassInterval();

        // Test expcetion when class interval description didn't define
        $this->expectException(DescriptionClassInervalIsNotDefined::class);
        $quantitativeVariables = new QuantitativeVariables(DataProvider::employeesSalary()['data']);
        $quantitativeVariables->sortData();
        $quantitativeVariables->setClassNumber();
        $quantitativeVariables->setBreadthSample();
        $quantitativeVariables->setIntervalClass();
        $quantitativeVariables->setClassBreaks();
        $quantitativeVariables->setFrequenciesByClassInterval();
    }

    /**
     * This test verifies if the midpoints were calculated when the method is
     * called and verifies if the exception is returned when the description class
     * interval didn't define
     *
     * @return void
     */
    public function testMethodSetMidPoinInFrequencies()
    {
        // Test in the correct flow to calculate de mid points of frequencies
        $quantitativeVariables = new QuantitativeVariables(DataProvider::employeesSalary()['data'], 0);
        $quantitativeVariables->sortData();
        $quantitativeVariables->setClassNumber();
        $quantitativeVariables->setBreadthSample();
        $quantitativeVariables->setIntervalClass();

        $quantitativeVariables->intervalClass = 130.00;
        $quantitativeVariables->setClassBreaks();
        $quantitativeVariables->setDescriptionClasIntervalInFrequency();
        $frequencies = $quantitativeVariables->setMidPointInFrequencies();

        $this->assertCount(7, $frequencies);

        $this->assertEquals(1015.0, $frequencies[1]->midPoint);
        $this->assertEquals(1275.0, $frequencies[3]->midPoint);
        $this->assertEquals(1665.0, $frequencies[6]->midPoint);
        $this->assertEquals(1795.0, $frequencies[7]->midPoint);

        // Test expcetion when the description class intervals didn't define
        $this->expectException(DescriptionClassInervalIsNotDefined::class);
        $quantitativeVariables = new QuantitativeVariables(DataProvider::employeesSalary()['data']);
        $quantitativeVariables->sortData();
        $quantitativeVariables->setClassNumber();
        $quantitativeVariables->setBreadthSample();
        $quantitativeVariables->setIntervalClass();
        $quantitativeVariables->setClassBreaks();
        $quantitativeVariables->setMidPointInFrequencies();
    }

    /**
     * This test verifies if the result values are right when the method
     * calculate is called
     *
     * @return void
     */
    public function testMethodCalculate()
    {
        $quantitativeVariables = new QuantitativeVariables();
        $quantitativeVariables->data = DataProvider::employeesSalary()['data'];
        $quantitativeVariables->decimalPlaces = 0;
        $result = $quantitativeVariables->calculate();
        $this->assertObjectHasAttribute('midPoint', $result->rows[6]);

        $quantitativeVariables = new QuantitativeVariables();
        $quantitativeVariables->data = DataProvider::defectiveParts()['data'];
        $quantitativeVariables->decimalPlaces = 0;
        $result = $quantitativeVariables->calculate();
        $this->assertObjectHasAttribute('variable', $result->rows[2]);
    }

    /**
     * This test verifies if the result values are right when the method
     * calculate is called forcing the use of the class interval in the calculate
     *
     * @return void
     */
    public function testMethodCalculeWhenForceToUseClassInterval()
    {
        $quantitativeVariables = new QuantitativeVariables();
        $quantitativeVariables->data = DataProvider::defectiveParts()['data'];
        $quantitativeVariables->decimalPlaces = 0;
        $result = $quantitativeVariables->calculate(true);
        $this->assertObjectHasAttribute('midPoint', $result->rows[0]);
    }

    /**
     * This test verifies if the result values are right when the method is
     * called and the class interval is provided as an argument,
     *
     * @return void
     */
    public function testMethodCalculateClassIntervalFrequencyProvideClassIntervalValue()
    {
        $quantitativeVariables = new QuantitativeVariables();
        $quantitativeVariables->data = DataProvider::employeesSalary()['data'];
        $quantitativeVariables->decimalPlaces = 0;
        $result = $quantitativeVariables->calculateClassIntervalFrequency(130.00);

        $this->assertEquals(130.00, $quantitativeVariables->intervalClass);
        $this->assertEquals(950.00, $quantitativeVariables->classBreaks[1]->lessLimit);
        $this->assertEquals(1080.00, $quantitativeVariables->classBreaks[1]->upperLimit);
        $this->assertObjectHasAttribute('midPoint', $result->rows[0]);
    }
}