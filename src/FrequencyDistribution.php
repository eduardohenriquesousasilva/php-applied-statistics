<?php

namespace drdhnrq\PhpAppliedStatistics;

use StdClass;
use drdhnrq\PhpAppliedStatistics\Traits\Helpers;

class FrequencyDistribution
{
    use Helpers;

    /**
     * Default decimal places
     */
    const DEFAULT_DECIMAL_PLACES = 5;

    /**
     * Decimal places defined in the class to use
     * in the round methods
     *
     * @var integer
     */
    public $decimalPlaces;

    /**
     * The data that will processed
     *
     * @var array
     */
    public $data;

    /**
     * The frequency Distribution
     *
     * @var array
     */
    public $frequencies;

    public function __construct(array $data = [], int $decimalPlaces = null)
    {
        $this->data = $data;
        $this->frequency = array();

        $this->decimalPlaces = (is_null($decimalPlaces))
            ? self::DEFAULT_DECIMAL_PLACES
            : $decimalPlaces;
    }

    /**
     * This method will sort the data in crescent order
     *
     * @return bool
     */
    public function sortData(): bool
    {
        return sort($this->data);
    }

    /**
     * This method will define de frequency variables, the variables that
     * are in the data
     *
     * @return array
     */
    public function setFrequencyVariables(): array
    {
        foreach ($this->data as $variable) {
            if (!isset($this->frequencies[$variable])) {
                $this->frequencies[$variable] = new StdClass();
                $this->frequencies[$variable]->variable = $variable;
            }
        }

        return $this->frequencies;
    }

    /**
     * This method will define the frequencies that were
     * indentified in the data
     *
     * @return array
     */
    public function setFrequencies(): array
    {
        foreach ($this->data as $variable) {
            if (!isset($this->frequencies[$variable])) {
                $this->frequencies[$variable] = new StdClass();
            }

            if (!isset($this->frequencies[$variable]->frequency)) {
                $this->frequencies[$variable]->frequency = 0;
            }

            $this->frequencies[$variable]->frequency++;
        }

        return $this->frequencies;
    }

}