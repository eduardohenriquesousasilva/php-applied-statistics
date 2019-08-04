<?php

namespace drdhnrq\PhpAppliedStatistics;

use StdClass;
use drdhnrq\PhpAppliedStatistics\Traits\Helpers;
use drdhnrq\PhpAppliedStatistics\Exceptions\VariableNotDefined;
use drdhnrq\PhpAppliedStatistics\Exceptions\FrequencyNotDefined;
use drdhnrq\PhpAppliedStatistics\Exceptions\AccumulateRelativeFrequency;
use drdhnrq\PhpAppliedStatistics\Exceptions\RelativeFrequencyNotDefined;
use drdhnrq\PhpAppliedStatistics\Exceptions\AccumulatePercentRelativeFrequency;
use drdhnrq\PhpAppliedStatistics\Exceptions\PercentRelativeFrequencyNotDefined;

class FrequencyDistribution
{
    use Helpers;

    /**
     * This constant defines the number of decimal places will be used when the
     * decimal places property didn't provide in the constructor of the class
     */
    const DEFAULT_DECIMAL_PLACES = 5;

    /**
     * This property contains the number of decimal places will be used to
     * round the values calculated
     *
     * @var integer
     */
    public $decimalPlaces;

    /**
     * This property contains the data will be analyzed and calculated
     * to return the statistics results
     *
     * @var array
     */
    public $data;

    /**
     * This property contains the frequencies distributions that were calculated
     * using the data that were received.
     * When the calculations will be finished this property will be an object
     * with all properties necessary to show a frequency distribution
     *
     * @var array
     */
    public $frequencies;

    /**
     * This property contains the totals of the frequency distribution, and
     * will show this information as a row totalizing
     *
     * @var StdClass;
     */
    public $totals;

    /**
     * All arguments are optional, but in a moment they are necessary to
     * calculate the statistics operations.
     *
     * @param array $data
     * @param integer $decimalPlaces
     */
    public function __construct(array $data = [], int $decimalPlaces = null)
    {
        $this->data = $data;
        $this->frequencies = array();
        $this->totals = new StdClass();

        $this->decimalPlaces = (is_null($decimalPlaces))
            ? self::DEFAULT_DECIMAL_PLACES
            : $decimalPlaces;
    }

    /**
     * This method will order in the data that are being analyzed, this way
     * the frequency distribution will be in crescent order
     *
     * @return array
     */
    public function sortData(): array
    {
        sort($this->data);
        return $this->data;
    }

    /**
     * This method will set what are the variables that were found in the
     * data that are analyzed.
     * When it executed the property frequencies will have the variables
     * of data analyzed
     *
     * @return array
     */
    public function setVariablesFrequency(): array
    {
        foreach (array_unique($this->data) as $variable) {
            $object = new StdClass();
            $object->variable = $variable;
            $this->frequencies[$variable] = $object;
        }

        return $this->frequencies;
    }

    /**
     * This method will use the frequencies property, that at this moment
     * needs have the variables.
     * An object will be added for each variable in the frequencies
     * with the frequency property that is the number of times that a variable
     * exists in the data.
     *
     * @return array
     */
    public function setFrequencies(): array
    {
        $firstElementArray = array_values($this->frequencies)[0];
        if (!isset($firstElementArray->variable)) {
            throw new VariableNotDefined();
        }

        foreach (array_count_values($this->data) as $variable => $frequency) {
            $this->frequencies[$variable]->frequency = $frequency;
        }

        return $this->frequencies;
    }

    /**
     * This method will add property relative frequency for each object in
     * the frequencies properties.
     * The relative frequency is the number of the frequency the variable exists
     * in relation with total data that are analyzed
     *
     * @return array
     */
    public function setRelativeFrequencies(): array
    {
        $firstElementArray = array_values($this->frequencies)[0];
        if (!isset($firstElementArray->frequency)) {
            throw new FrequencyNotDefined();
        }

        $totalData = count($this->data);
        foreach ($this->frequencies as $row) {
            $relativefrequency = $row->frequency / $totalData;
            $row->relativeFrequency = $this->round($relativefrequency, $this->decimalPlaces);
        }

        return $this->frequencies;
    }

    /**
     * This method will add property percent relative frequency for each object
     * in the frequencies properties.
     * The percent relative frequency is the percent value that the relative
     * frequency represent of the total data
     *
     * @return array
     */
    public function setPercentRelativeFrequencies(): array
    {
        $firstElementArray = array_values($this->frequencies)[0];
        if (!isset($firstElementArray->relativeFrequency)) {
            throw new RelativeFrequencyNotDefined();
        }

        foreach ($this->frequencies as $row) {
            $percentRelativeFrequency = $row->relativeFrequency * 100;
            $row->percentRelativeFrequency = $this->round($percentRelativeFrequency, $this->decimalPlaces);
        }

        return $this->frequencies;
    }

    /**
     * This method will add property accumulate frequency for each object in
     * the frequencies property.
     * The accumulate frequency is the sum de frequencies accumulating the value
     * of each row data. Each variable corresponds to a row
     *
     * @return array
     */
    public function setAccumulateFrequencies(): array
    {
        $firstElementArray = array_values($this->frequencies)[0];
        if (!isset($firstElementArray->frequency)) {
            throw new FrequencyNotDefined();
        }

        $carry = 0;
        foreach ($this->frequencies as $row) {
            $row->accumulateFrequency = $carry += $row->frequency;
        }

        return $this->frequencies;
    }

    /**
     * This method will add property accumulate relative property for each
     * object in the frequencies property.
     * The accumulate relative frequency is the sum de relative frequencies
     * accumulating the value of each row data. Each variable corresponds to a row
     *
     * @return array
     */
    public function setAccumulateRelativeFrequencies(): array
    {
        $firstElementArray = array_values($this->frequencies)[0];
        if (!isset($firstElementArray->relativeFrequency)) {
            throw new RelativeFrequencyNotDefined();
        }

        $carry = 0;
        foreach ($this->frequencies as $row) {
            $row->accumulateRelativeFrequency = $carry += $row->relativeFrequency;
        }

        return $this->frequencies;
    }

    /**
     * This method will add property percent accumulate relative property for
     * each object in the frequencies property.
     * The percent accumulate relative frequency is the sum de percent relative
     * frequencies accumulating the value of each row data. Each variable
     * corresponds to a row.
     *
     * @return array
     */
    public function setPercentAccumulateRelativeFrequencies(): array
    {
        $firstElementArray = array_values($this->frequencies)[0];
        if (!isset($firstElementArray->percentRelativeFrequency)) {
            throw new PercentRelativeFrequencyNotDefined();
        }

        $carry = 0;
        foreach ($this->frequencies as $row) {
            $row->accumulatePercentRelativeFrequency = $carry += $row->percentRelativeFrequency;
        }

        return $this->frequencies;
    }

    /**
     * This method will set the totals that were got after  the calculations of
     * frequency distribution
     *
     * @return StdClass
     */
    public function setTotals(): StdClass
    {
        $firstElementArray = array_values($this->frequencies)[0];

        if (!isset($firstElementArray->accumulateRelativeFrequency)) {
            throw new AccumulateRelativeFrequency();
        }

        if (!isset($firstElementArray->accumulatePercentRelativeFrequency)) {
            throw new AccumulatePercentRelativeFrequency();
        }

        $this->totals->frequency = count($this->data);

        $this->totals->relativeFrequency = $this->round(
            end($this->frequencies)->accumulateRelativeFrequency,
            $this->decimalPlaces
        );

        $this->totals->percentRelativeFrequency = $this->round(
            end($this->frequencies)->accumulatePercentRelativeFrequency,
            $this->decimalPlaces
        );

        return $this->totals;
    }
}