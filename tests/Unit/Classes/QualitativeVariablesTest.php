<?php

use PHPUnit\Framework\TestCase;
use drdhnrq\PhpAppliedStatistics\QualitativeVariables;
use drdhnrq\PhpAppliedStatistics\FrequencyDistribution;

require_once __DIR__ . '../../../Data/DataProvider.php';

class QualitativeVariablesTest extends TestCase
{
    /********************************************************************************
     *
     * Smoke TESTS
     *
    *********************************************************************************/

    /**
     * This test verifies if the class QualitativeVariables extends of
     * the class FrequencyDistribution
     *
     * @return void
     */
    public function testExtendClassFrequencyDistribution()
    {
        $frequencyDistribution = new FrequencyDistribution();
        $qualitativeVariables = new QualitativeVariables();

        $this->assertEquals(
            true,
            is_subclass_of($qualitativeVariables, get_class($frequencyDistribution)),
            'This class doesn\'t extends of FrequencyDistribution'
        );
    }

    /**
     * This tests verifies if the methods of this class exists
     *
     * @return void
     */
    public function testMethodsExists()
    {
        $qualitativeVariables = new QualitativeVariables();

        // calculate()
        $this->assertEquals(
            true,
            method_exists($qualitativeVariables, 'calculate'),
            'The property calculate doesn\'t exists in the class'
        );
    }

    /********************************************************************************
     *
     * METHODS TESTS
     *
    *********************************************************************************/

    /**
     * This test checks the result values when the method calculate called and the
     * order data wasn't provided as an argument, the values are checking to have
     * really that it's right
     *
     * @return void
     */
    public function testCalculateMethodWithoutOrderedVariables()
    {
        $qualitativeVariables = new QualitativeVariables(DataProvider::civilStatusPeople()['data']);
        $result = $qualitativeVariables->calculate();

        $this->assertEquals('Casado', $result->rows[0]->variable);
        $this->assertEquals(0.39286, $result->rows[0]->relativeFrequency);
        $this->assertEquals(39.286, $result->rows[0]->accumulatePercentRelativeFrequency);

        $this->assertEquals('Viúvo', $result->rows[3]->variable);
        $this->assertEquals(0.07143, $result->rows[3]->relativeFrequency);
        $this->assertEquals(100.0, $result->rows[3]->accumulatePercentRelativeFrequency);
    }

    /**
     * This test verifies the result value when the method calculate called
     * passing the ordered variables to use in the calculate
     *
     * @return void
     */
    public function testCalculateMethodWithOrderedVariables()
    {
        $qualitativeVariables = new QualitativeVariables(DataProvider::civilStatusPeople()['data']);
        $result = $qualitativeVariables->calculate(['solteiro', 'casado', 'viúvo', 'separado']);

        $this->assertEquals('Casado', $result->rows[1]->variable);
        $this->assertEquals(0.39286, $result->rows[1]->relativeFrequency);
        $this->assertEquals(62.5, $result->rows[1]->accumulatePercentRelativeFrequency);

        $this->assertEquals('Viúvo', $result->rows[2]->variable);
        $this->assertEquals(0.07143, $result->rows[2]->relativeFrequency);
        $this->assertEquals(69.643, $result->rows[2]->accumulatePercentRelativeFrequency);
    }
}