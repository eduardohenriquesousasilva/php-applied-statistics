<?php

require_once __DIR__ . '../../../Data/DataProvider.php';

use StdClass;
use PHPUnit\Framework\TestCase;
use drdhnrq\PhpAppliedStatistics\QuantitativeVariables;
use drdhnrq\PhpAppliedStatistics\Exceptions\DataIsEmpty;
use drdhnrq\PhpAppliedStatistics\Exceptions\DataIsnotOrdered;
use drdhnrq\PhpAppliedStatistics\Exceptions\ClassNumberIsNotDefined;
use drdhnrq\PhpAppliedStatistics\Exceptions\BreadthSampleIsNotDefined;
use drdhnrq\PhpAppliedStatistics\Exceptions\IntervalClassIsNotDefined;

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
}