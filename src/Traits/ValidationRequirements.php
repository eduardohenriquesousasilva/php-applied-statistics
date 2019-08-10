<?php

namespace drdhnrq\PhpAppliedStatistics\Traits;

use drdhnrq\PhpAppliedStatistics\Exceptions\DataIsEmpty;
use drdhnrq\PhpAppliedStatistics\Exceptions\DataIsnotOrdered;
use drdhnrq\PhpAppliedStatistics\Exceptions\VariableNotDefined;
use drdhnrq\PhpAppliedStatistics\Exceptions\FrequencyNotDefined;
use drdhnrq\PhpAppliedStatistics\Exceptions\ClassBreaksIsNotDefined;
use drdhnrq\PhpAppliedStatistics\Exceptions\ClassNumberIsNotDefined;
use drdhnrq\PhpAppliedStatistics\Exceptions\BreadthSampleIsNotDefined;
use drdhnrq\PhpAppliedStatistics\Exceptions\IntervalClassIsNotDefined;
use drdhnrq\PhpAppliedStatistics\Exceptions\AccumulateRelativeFrequency;
use drdhnrq\PhpAppliedStatistics\Exceptions\RelativeFrequencyNotDefined;
use drdhnrq\PhpAppliedStatistics\Exceptions\AccumulatePercentRelativeFrequency;
use drdhnrq\PhpAppliedStatistics\Exceptions\PercentRelativeFrequencyNotDefined;
use drdhnrq\PhpAppliedStatistics\Exceptions\DescriptionClassInervalIsNotDefined;

trait ValidationRequirements
{
    /**
     * Main method that apply validation of requirements to execute
     * the calculations, this method will call dymanic the validation
     * that are provide with argument
     *
     * @param array $validations
     * @return void
     */
    public function validationRequirements(array $validations): void
    {
        foreach ($validations as $validation) {
            $nameMethodValidation = 'required' . ucfirst($validation);
            $this->{$nameMethodValidation}();
        }
    }

    /**
     * Validate if the data is not empty
     *
     * @return void
     */
    public function requiredData(): void
    {
        $countData = count($this->data);
        if (!$countData) {
            throw new DataIsEmpty();
        }
    }

    /**
     * Validate if the data is ordered
     *
     * @return void
     */
    public function requiredOrderedData(): void
    {
        $cloneDataSorted = $this->data;
        sort($cloneDataSorted);

        if ($this->data !== $cloneDataSorted) {
            throw new DataIsnotOrdered();
        }
    }

    /**
     * Validate if the variables were defineds
     *
     * @return void
     */
    public function requiredVariables(): void
    {
        $firstElementArray = array_values($this->frequencies)[0];
        if (!isset($firstElementArray->variable)) {
            throw new VariableNotDefined();
        }
    }

    /**
     * Validate if the frequencies were defineds
     *
     * @return void
     */
    public function requiredFrequency(): void
    {
        $firstElementArray = array_values($this->frequencies)[0];
        if (!isset($firstElementArray->frequency)) {
            throw new FrequencyNotDefined();
        }
    }

    /**
     * Validate if the relative frequencies were defineds
     *
     * @return void
     */
    public function requiredRelativeFrequency(): void
    {
        $firstElementArray = array_values($this->frequencies)[0];
        if (!isset($firstElementArray->relativeFrequency)) {
            throw new RelativeFrequencyNotDefined();
        }
    }

    /**
     * Validate if the percent relative frequencies were defineds
     *
     * @return void
     */
    public function requiredPercentRelativeFrequency(): void
    {
        $firstElementArray = array_values($this->frequencies)[0];
        if (!isset($firstElementArray->percentRelativeFrequency)) {
            throw new PercentRelativeFrequencyNotDefined();
        }
    }

    /**
     * Validate if the accumulate relative frequencies were defineds
     *
     * @return void
     */
    public function requiredAccumulateRelativeFrequency(): void
    {
        $firstElementArray = array_values($this->frequencies)[0];
        if (!isset($firstElementArray->accumulateRelativeFrequency)) {
            throw new AccumulateRelativeFrequency();
        }
    }

    /**
     * Validate if the accumulate percent relative frequencies were defineds
     *
     * @return void
     */
    public function requiredAccumulatePercentRelativeFrequency(): void
    {
        $firstElementArray = array_values($this->frequencies)[0];
        if (!isset($firstElementArray->accumulatePercentRelativeFrequency)) {
            throw new AccumulatePercentRelativeFrequency();
        }
    }

    /**
     * Validate if the breadth samples was defined
     *
     * @return void
     */
    public function requiredBreadthSample(): void
    {
        if (is_null($this->breadthSample)) {
            throw new BreadthSampleIsNotDefined();
        }
    }

    /**
     * Validate if the class number was defined
     *
     * @return void
     */
    public function requiredClassNumber(): void
    {
        if (is_null($this->classNumber)) {
            throw new ClassNumberIsNotDefined();
        }
    }

    /**
     * Validate if the class interval was defined
     *
     * @return void
     */
    public function requiredClassInterval(): void
    {
        if (is_null($this->intervalClass)) {
            throw new IntervalClassIsNotDefined();
        }
    }

    /**
     * Validate if the class breaks was defined
     *
     * @return void
     */
    public function requiredClassBreaks(): void
    {
        if (empty($this->classBreaks)) {
            throw new ClassBreaksIsNotDefined();
        }
    }

    /**
     * Validate if the description class interval was defined
     * in the frequencies
     *
     * @return void
     */
    public function requiredDescriptionClassIntervals(): void
    {
        $firstElementArray = array_values($this->frequencies)[0];
        if (!isset($firstElementArray->descriptionClassInteval)) {
            throw new DescriptionClassInervalIsNotDefined();
        }
    }
}