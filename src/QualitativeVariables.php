<?php

namespace drdhnrq\PhpAppliedStatistics;

use StdClass;
use drdhnrq\PhpAppliedStatistics\FrequencyDistribution;

class QualitativeVariables extends FrequencyDistribution
{
    public function __construct(array $data = [], int $decimalPlaces = null)
    {
        parent::__construct($data, $decimalPlaces);
    }

    /**
     * This method will apply the calculate frequency distribution,
     * the variables of data can be provide as argument in this method
     *
     * @param array $variablesOrdered
     * @return StdClass
     */
    public function calculate(array $variablesOrdered = []): StdClass
    {
        $this->validationRequirements(['data']);

        $this->data = $this->formatStringData($this->data);

        if (!empty($variablesOrdered)) {
            $variablesOrdered = $this->formatStringData($variablesOrdered);
            $this->validManualDefinedVariables($variablesOrdered);
        }

        $this->sortData();
        $this->setVariablesFrequency($variablesOrdered);
        $this->setFrequencies();
        $this->setRelativeFrequencies();
        $this->setPercentRelativeFrequencies();
        $this->setAccumulateFrequencies();
        $this->setAccumulateRelativeFrequencies();
        $this->setPercentAccumulateRelativeFrequencies();

        return $this->setResults();
    }
}