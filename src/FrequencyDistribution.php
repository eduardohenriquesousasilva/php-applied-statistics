<?php

namespace drdhnrq\PhpAppliedStatistics;

use drdhnrq\PhpAppliedStatistics\Traits\DefaultValidations;
use StdClass;
use drdhnrq\PhpAppliedStatistics\Traits\Helpers;
use drdhnrq\PhpAppliedStatistics\Traits\ValidationRequirements;

class FrequencyDistribution
{
    use Helpers, ValidationRequirements, DefaultValidations;

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
     * This property will contain the result of frequency distribution
     * applied
     *
     * @var StdClass
     */
    public $result;

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
        $this->result = new StdClass();

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
        $this->validationRequirements(['data']);

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
    public function setVariablesFrequency(array $variablesOrder = []): array
    {
        $this->validationRequirements(['data']);

        $variables = (!empty($variablesOrder))
            ? $variablesOrder
            : array_unique($this->data);

        foreach ($variables as $variable) {
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
        $this->validationRequirements(['variables']);

        foreach ($this->data as $variable) {
            if (!isset($this->frequencies[$variable]->frequency)) {
                $this->frequencies[$variable]->frequency = 0;
            }
            $this->frequencies[$variable]->frequency++;
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
        $this->validationRequirements(['frequency']);

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
        $this->validationRequirements(['relativefrequency']);

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
        $this->validationRequirements(['frequency']);

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
        $this->validationRequirements(['relativeFrequency']);

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
        $this->validationRequirements(['percentRelativeFrequency']);

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
        $this->validationRequirements([
            'accumulateRelativeFrequency',
            'accumulatePercentRelativeFrequency'
        ]);

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

    /**
     * This methods will call the method totals to put theses
     * values in the result with frequency distribution that
     * was calculated, this method will format the result response
     * and save this value in the property results in the class
     *
     * @return StdClass
     */
    public function setResults(): StdClass
    {
        $this->validationRequirements(['frequency']);

        $this->setTotals();

        $this->result = (object) [
            'rows' => [],
            'totals' => $this->totals
        ];

        $classNumber = 1;
        foreach ($this->frequencies as $frequency) {
            $frequency->class = $classNumber;
            array_push($this->result->rows, $frequency);
        }

        return $this->result;
    }
}