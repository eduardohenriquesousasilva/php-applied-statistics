<?php

require_once __DIR__ . '../../../Data/DataProvider.php';

use PHPUnit\Framework\TestCase;
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
     * Smoke tests EXISTS PROPERTIES
     *
    *********************************************************************************/

    /**
     * This test will verify if the classNumber property exists in this class
     * @return void
     */
    public function testExpectedExistPropertyClassNumber(): void
    {
        $quantitativeVariables = new QuantitativeVariables();
        $this->assertTrue(
            property_exists($quantitativeVariables, 'classNumber'),
            'The classNumber property doesn\'t exist in the class QuantitativeVariables'
        );
    }

    /**
     * This test will verify if the breadthSample property exists in this class
     * @return void
     */
    public function testExpectedExistPropertyBreadthSample(): void
    {
        $quantitativeVariables = new QuantitativeVariables();
        $this->assertTrue(
            property_exists($quantitativeVariables, 'breadthSample'),
            'The breadthSample property doesn\'t exist in the class QuantitativeVariables'
        );
    }

    /**
     * This test will verify if the intervalClass property exists in this class
     * @return void
     */
    public function testExpectedExistPropertyIntervalClass(): void
    {
        $quantitativeVariables = new QuantitativeVariables();
        $this->assertTrue(
            property_exists($quantitativeVariables, 'intervalClass'),
            'The intervalClass property doesn\'t exist in the class QuantitativeVariables'
        );
    }

    /**
     * This test will verify if the classBreaks property exists in this class
     * @return void
     */
    public function testExpectedExistPropertyClassBreaks(): void
    {
        $quantitativeVariables = new QuantitativeVariables();
        $this->assertTrue(
            property_exists($quantitativeVariables, 'classBreaks'),
            'The classBreaks property doesn\'t exist in the class QuantitativeVariables'
        );
    }

    /********************************************************************************
     *
     * Smoke tests EXISTS METHODS
     *
    *********************************************************************************/

    /**
     * This test will verify if the setClassNumber property exists in this class
     * @return void
     */
    public function testExpectedExistMethodSetClassNumber(): void
    {
        $quantitativeVariables = new QuantitativeVariables();
        $this->assertTrue(
            method_exists($quantitativeVariables, 'setClassNumber'),
            'The setClassNumber method doesn\'t exist in the class QuantitativeVariables'
        );
    }

    /**
     * This test will verify if the setBreadthSample property exists in this class
     * @return void
     */
    public function testExpectedExistMethodSetBreadthSample(): void
    {
        $quantitativeVariables = new QuantitativeVariables();
        $this->assertTrue(
            method_exists($quantitativeVariables, 'setBreadthSample'),
            'The setBreadthSample method doesn\'t exist in the class QuantitativeVariables'
        );
    }

    /**
     * This test will verify if the setIntervalClass property exists in this class
     * @return void
     */
    public function testExpectedExistMethodSetIntervalClass(): void
    {
        $quantitativeVariables = new QuantitativeVariables();
        $this->assertTrue(
            method_exists($quantitativeVariables, 'setIntervalClass'),
            'The setIntervalClass method doesn\'t exist in the class QuantitativeVariables'
        );
    }

    /**
     * This test will verify if the setClassBreaks property exists in this class
     * @return void
     */
    public function testExpectedExistMethodSetClassBreaks(): void
    {
        $quantitativeVariables = new QuantitativeVariables();
        $this->assertTrue(
            method_exists($quantitativeVariables, 'setClassBreaks'),
            'The setClassBreaks method doesn\'t exist in the class QuantitativeVariables'
        );
    }

    /**
     * This test will verify if the calculateClassIntervalFrequency property exists in this class
     * @return void
     */
    public function testExpectedExistMethodCalculateClassIntervalFrequency(): void
    {
        $quantitativeVariables = new QuantitativeVariables();
        $this->assertTrue(
            method_exists($quantitativeVariables, 'calculateClassIntervalFrequency'),
            'The calculateClassIntervalFrequency method doesn\'t exist in the class QuantitativeVariables'
        );
    }

    /**
     * This test will verify if the calculateSimpleFrequency property exists in this class
     * @return void
     */
    public function testExpectedExistMethodCalculateSimpleFrequency(): void
    {
        $quantitativeVariables = new QuantitativeVariables();
        $this->assertTrue(
            method_exists($quantitativeVariables, 'calculateSimpleFrequency'),
            'The calculateSimpleFrequency method doesn\'t exist in the class QuantitativeVariables'
        );
    }

    /**
     * This test will verify if the calculate property exists in this class
     * @return void
     */
    public function testExpectedExistMethodCalculate(): void
    {
        $quantitativeVariables = new QuantitativeVariables();
        $this->assertTrue(
            method_exists($quantitativeVariables, 'calculate'),
            'The calculate method doesn\'t exist in the class QuantitativeVariables'
        );
    }

    /********************************************************************************
     *
     * Test CLASS METHODS
     *
    *********************************************************************************/

    /**
     * This test verifies if the property classNumber is defined when the method
     * setClassNumber() is the called
     * @return void
     */
    public function testExpectedClassNumberDefinedWhenMethodIsCalled(): void
    {
        $quantitativeVariables = new QuantitativeVariables(DataProvider::employeesSalary()['data']);
        $quantitativeVariables->setClassNumber();
        $this->assertEquals(7, $quantitativeVariables->classNumber);
    }

    /**
     * This test verifies if the Exception DataIsEmpty is returned when the method
     * setClassNumber() is called and the data wasn't provide to calculate
     * @return void
     */
    public function testExpectedExceptionWhenSetClassNumberIsCalledAndDataWereEmpty(): void
    {
        $this->expectException(DataIsEmpty::class);

        $quantitativeVariables = new QuantitativeVariables();
        $quantitativeVariables->setClassNumber();
    }

    /**
     * This test verifies if the breadth samples is defined when the method
     * setBreadthSample() is called
     * @return void
     */
    public function testExpectedBreadthSampleDefinedWhenMethodIsCalled(): void
    {
        $quantitativeVariables = new QuantitativeVariables(DataProvider::employeesSalary()['data']);
        $quantitativeVariables->sortData();
        $quantitativeVariables->setBreadthSample();

        $this->assertEquals(900, $quantitativeVariables->breadthSample);
    }

    /**
     * This test verifies if the exception DataIsEmpty is returned when the method
     * setBreadthSample() is called and the data isn't provide to calculate
     * @return void
     */
    public function testExpectedExceptionWhenSetBreadthSampleIsCalledAndDataWereEmpty(): void
    {
        $this->expectException(DataIsEmpty::class);

        $quantitativeVariables = new QuantitativeVariables();
        $quantitativeVariables->setBreadthSample();
    }

    /**
     * This test verifies if the exception DataIsnotOrdered is returned when the method
     * setBreadthSample() is called and the data weren't ordered
     * @return void
     */
    public function testExpectedExceptionWhenSetBreadthSampleIsCalledAndDataWerentSorted(): void
    {
        $this->expectException(DataIsnotOrdered::class);

        $quantitativeVariables = new QuantitativeVariables(DataProvider::employeesSalary()['data']);
        $quantitativeVariables->setBreadthSample();
    }

    /**
     * This test verifies if the intervalClass is defined when the method
     * setIntervalClass() is called
     * @return void
     */
    public function testExpectedIntervalClassDefinedWhenMethodIsCalled(): void
    {
        $quantitativeVariables = new QuantitativeVariables(DataProvider::employeesSalary()['data'], 2);
        $quantitativeVariables->sortData();
        $quantitativeVariables->setClassNumber();
        $quantitativeVariables->setBreadthSample();
        $quantitativeVariables->setIntervalClass();

        $this->assertEquals(128.57, $quantitativeVariables->intervalClass);
    }

    /**
     * This test verifies if the excepetion BreadthSampleIsNotDefined when the method
     * setIntervalClass() is called and the breadth sample wasn't defined
     * @return void
     */
    public function testExpectedExceptionWhenSetIntervalClassIsCalledAndBreadthSampleIsnotDefined(): void
    {
        $this->expectException(BreadthSampleIsNotDefined::class);

        $quantitativeVariables = new QuantitativeVariables(DataProvider::employeesSalary()['data']);
        $quantitativeVariables->setIntervalClass();
    }

    /**
     * This test verifies if the exception ClassNumberIsNotDefined is returned when the method
     * setIntervalClass() is called and the class number wasn't defined
     * @return void
     */
    public function testExpectedExceptionWhenSetIntervalClassIsCalledAndClassNumberIsnotDefined(): void
    {
        $this->expectException(ClassNumberIsNotDefined::class);

        $quantitativeVariables = new QuantitativeVariables(DataProvider::employeesSalary()['data']);
        $quantitativeVariables->sortData();
        $quantitativeVariables->setBreadthSample();
        $quantitativeVariables->setIntervalClass();
    }

    /**
     * This test verifies if the classBreaks is defined when the method
     * setClassBreaks() is called
     * @return void
     */
    public function testExpectedClassBreaksDefinedWhenMethodIsCalled(): void
    {
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
    }

    /**
     * This test verifies if the excepetion DataIsEmpty when the method
     * setClassBreaks() is called and the data wasn't defined
     * @return void
     */
    public function testExpectedExceptionWhenSetClassBreakIsCalledAndDataIsEmpty(): void
    {
        $this->expectException(DataIsEmpty::class);
        $quantitativeVariables = new QuantitativeVariables();
        $quantitativeVariables->setClassBreaks();
    }

    /**
     * This test verifies if the excepetion DataIsnotOrdered when the method
     * setClassBreaks() is called and the data wasn't ordered
     * @return void
     */
    public function testExpectedExceptionWhenSetClassBreakIsCalledAndDataIsnotOrdered(): void
    {
        $this->expectException(DataIsnotOrdered::class);
        $quantitativeVariables = new QuantitativeVariables(DataProvider::employeesSalary()['data']);
        $quantitativeVariables->setClassBreaks();
    }

    /**
     * This test verifies if the excepetion ClassNumberIsNotDefined when the method
     * setClassBreaks() is called and the class number wasn't defined
     * @return void
     */
    public function testExpectedExceptionWhenSetClassBreakIsCalledAndClassNumberIsnotDefined(): void
    {
        $this->expectException(ClassNumberIsNotDefined::class);
        $quantitativeVariables = new QuantitativeVariables(DataProvider::employeesSalary()['data']);
        $quantitativeVariables->sortData();
        $quantitativeVariables->setBreadthSample();
        $quantitativeVariables->setClassBreaks();
    }

    /**
     * This test verifies if the excepetion IntervalClassIsNotDefined when the method
     * setClassBreaks() is called and the interval class wasn't defined
     * @return void
     */
    public function testExpectedExceptionWhenSetClassBreakIsCalledAndIntervalClassIsnotDefined(): void
    {
        $this->expectException(IntervalClassIsNotDefined::class);
        $quantitativeVariables = new QuantitativeVariables(DataProvider::employeesSalary()['data']);
        $quantitativeVariables->sortData();
        $quantitativeVariables->setClassNumber();
        $quantitativeVariables->setBreadthSample();
        $quantitativeVariables->setClassBreaks();
    }

    /**
     * This test verifies if the description class interval is defined in the frequencies
     * when the method setDescriptionClasIntervalInFrequency() is called
     * @return void
     */
    public function testExpectedDescriptionIntervalClassDefinedWhenMethodIsCalled(): void
    {
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
    }

    /**
     * This test verifies if the excepetion ClassBreaksIsNotDefined when the method
     * setDescriptionClasIntervalInFrequency() is called and the class breaks wasn't defined
     * @return void
     */
    public function testExpectedExceptionWhenSetDescriptionClasIntervalInFrequencyIsCalledAndClassBreakIsNotDefined(): void
    {
        $this->expectException(ClassBreaksIsNotDefined::class);
        $quantitativeVariables = new QuantitativeVariables(DataProvider::employeesSalary()['data']);
        $quantitativeVariables->sortData();
        $quantitativeVariables->setClassNumber();
        $quantitativeVariables->setBreadthSample();
        $quantitativeVariables->setDescriptionClasIntervalInFrequency();
    }

    /**
     * This test verifies if frequency is defined in the frequencies when the method
     * setFrequenciesByClassInterval() is called
     * @return void
     */
    public function testExpectedFrequenciesDefinedWhenMethodIsCalled(): void
    {
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
    }


    /**
     * This test verifies if the excepetion DataIsEmpty when the method
     * setFrequenciesByClassInterval() is called and the data wasn't defined
     * @return void
     */
    public function testExpectedExceptionWhenSetFrequenciesByClassIntervalIsCalledAndDataIsEmpty(): void
    {
        $this->expectException(DataIsEmpty::class);
        $quantitativeVariables = new QuantitativeVariables();
        $quantitativeVariables->setFrequenciesByClassInterval();
    }

    /**
     * This test verifies if the excepetion DataIsnotOrdered when the method
     * setFrequenciesByClassInterval() is called and the data wasn't ordered
     * @return void
     */
    public function testExpectedExceptionWhenSetFrequenciesByClassIntervalIsCalledAndDataIsnotOrdered(): void
    {
        $this->expectException(DataIsnotOrdered::class);
        $quantitativeVariables = new QuantitativeVariables(DataProvider::employeesSalary()['data']);
        $quantitativeVariables->setFrequenciesByClassInterval();
    }

    /**
     * This test verifies if the excepetion ClassBreaksIsNotDefined when the method
     * setFrequenciesByClassInterval() is called and the class breaks wasn't defined
     * @return void
     */
    public function testExpectedExceptionWhenSetFrequenciesByClassIntervalIsCalledAndClassBreakIsNotDefined(): void
    {
        $this->expectException(ClassBreaksIsNotDefined::class);
        $quantitativeVariables = new QuantitativeVariables(DataProvider::employeesSalary()['data']);
        $quantitativeVariables->sortData();
        $quantitativeVariables->setClassNumber();
        $quantitativeVariables->setBreadthSample();
        $quantitativeVariables->setFrequenciesByClassInterval();
    }

    /**
     * This test verifies if the excepetion DescriptionClassInervalIsNotDefined when the method
     * setFrequenciesByClassInterval() is called and the description class wasn't defined
     * in the frequencies
     * @return void
     */
    public function testExpectedExceptionWhenSetFrequenciesByClassIntervalIsCalledAndDescriptionClassInervalIsNotDefined(): void
    {
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
     * This test verifies if the description class interval is defined in the frequencies
     * when the method setMidPointInFrequencies() is called
     * @return void
     */
    public function testExpectedMidPointDefinedWhenMethodIsCalled(): void
    {
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
    }

    /**
     * This test verifies if the excepetion DescriptionClassInervalIsNotDefined when the method
     * setMidPointInFrequencies() is called and the description class wasn't defined
     * in the frequencies
     * @return void
     */
    public function testExpectedExceptionWhenSetMidPointInFrequenciesIsCalledAndDescriptionClassInervalIsNotDefined(): void
    {
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
     * This test verifies if the method calculate is call the correct method
     * to apply the frequency distribution when the type of should used to calculate
     * wasn't proved as argument
     * @return void
     */
    public function testExpectedFrequenciesDefinedCorretMethodWhenMethodCalculateIsCalled(): void
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
     * This test will verifies if the frequency distribution is calculated with
     * the class interval when the argument is provide to calculate method to
     * force use this properties in the calculation
     * @return void
     */
    public function testExpectedFrequenciesDefinedForceUseIntervalClassWhenArgumentIsProvideToMethodCalculateIsCalled(): void
    {
        $quantitativeVariables = new QuantitativeVariables();
        $quantitativeVariables->data = DataProvider::defectiveParts()['data'];
        $quantitativeVariables->decimalPlaces = 0;
        $result = $quantitativeVariables->calculate(true);
        $this->assertObjectHasAttribute('midPoint', $result->rows[0]);
    }

    /**
     * This test Verifies if the class interval provide as argument is used when
     * the method to calculate the frequencies with class interval received this
     * value as argument
     * calculateClassIntervalFrequency()
     * @return void
     */
    public function testExpectedUseTheClassIntervalProvideAsArgumentWhenMethodCalculateClassIntervalFrequencyIsCalled(): void
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