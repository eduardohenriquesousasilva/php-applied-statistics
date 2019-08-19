<?php

namespace drdhnrq\PhpAppliedStatistics;

use StdClass;
use drdhnrq\PhpAppliedStatistics\Traits\Helpers;

/**
 * Appliedstatistics is the main class of the package PHP Applied Statics
 * the properties and methods to calculate your data will be available in
 * this class
 *
 * @package AppliedStatistcs
 * @author Eduardo Henrique de Sousa Silva <dev.eduardohenrique@gmail.com>
 * @version 1.0.0
 */
class AppliedStatistics
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
     * This property will contain the result of frequency distribution
     * applied
     *
     * @var StdClass
     */
    public $results;

    /**
     * @param integer $decimalPlaces
     */
    public function __construct(int $decimalPlaces = null)
    {
        $this->decimalPlaces = (is_null($decimalPlaces))
            ? self::DEFAULT_DECIMAL_PLACES
            : $decimalPlaces;
    }

    /**
     * This method will calculate the frequency distribution choosing it is
     * necessary to use the class interval or no, the calculation that is made
     * here is full, but if the class interval was provided as  argument
     * the class interval will be applied in this operation
     *
     * @param array $data
     * @param bool|null $useClassInterval
     * @return StdClass
     */
    public function quantitativeVariables(array $data, $useClassInterval = null): StdClass
    {
        $quantitativeVariables = new QuantitativeVariables($data, $this->decimalPlaces);
        return $this->result = $quantitativeVariables->calculate($useClassInterval);
    }

    /**
     * This method will calculate the frequency distribution with the class intervals
     * it's possbile provide the class interval in this method
     *
     * @param array $data
     * @param bool|null $intervalClass
     * @return StdClass
     */
    public function quantitativeVariablesIntervalClass(array $data, $intervalClass): StdClass
    {
        $quantitativeVariables = new QuantitativeVariables($data, $this->decimalPlaces);
        return $this->result = $quantitativeVariables->calculateClassIntervalFrequency($intervalClass);
    }
}