<?php

use PHPUnit\Framework\TestCase;
use drdhnrq\PhpAppliedStatistics\QualitativeVariables;
use drdhnrq\PhpAppliedStatistics\FrequencyDistribution;

require_once __DIR__ . '../../../Data/DataProvider.php';

class QualitativeVariablesTest extends TestCase
{
    /********************************************************************************
     *
     * Smoke tests DEPENDENCIES
     *
    *********************************************************************************/

    /**
     * This test will verify if this class is a subclass of Frequecency Distribution
     * @return void
     */
    public function testExpetedClassExtendsFrequencyDistributionClass(): void
    {
        $frequencyDistribution = new FrequencyDistribution();
        $qualitativeVariables = new QualitativeVariables();

        $this->assertEquals(
            true,
            is_subclass_of($qualitativeVariables, get_class($frequencyDistribution), false),
            'This class doesn\'t extend the class FrequencyDistribution'
        );
    }

    /********************************************************************************
     *
     * Smoke tests EXISTS METHODS
     *
    *********************************************************************************/

    /**
     * This test will verify if the calculate() method exists in this class
     * @return void
     */
    public function testExpectedExistMethodCalculate(): void
    {
        $qualitativeVariables = new QualitativeVariables();
        $this->assertTrue(
            method_exists($qualitativeVariables, 'calculate'),
            'The calculate method doesn\'t exist in the class QualitativeVariables'
        );
    }
}