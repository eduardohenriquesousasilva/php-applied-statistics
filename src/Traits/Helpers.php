<?php

namespace drdhnrq\PhpAppliedStatistics\Traits;

/**
 * Helper is a Trait to use in the different classes, it contains
 * the simple methods that can useful for other classes
 *
 * @package HelperTest
 * @author Eduardo Henrique de Sousa Silva <dev.eduardohenrique@gmail.com>
 * @version 1.0.0
 */
trait Helpers
{
    /**
     * Default decimal places
     *
     * @var integer
     */
    public $decimalPlaces = 4;

    /**
     * Round numbers
     *
     * The decimal places is optional argument, if it wasnt
     * informed the decimal places will to be the default
     * decimal places declared in the trait
     *
     * @param float $number
     * @param integer $decimalPlaces
     *
     * @return float
     */
    public function round(float $number, $decimalPlaces = null): float
    {
        $decimalPlaces = is_null($decimalPlaces)
            ? $this->decimalPlaces
            : $decimalPlaces;

        return floatval(round($number, $decimalPlaces));
    }

    /**
     * Calculate the percent
     *
     * This method will calculate the percent value, using the amount and percent
     * passed as arguments of method, if the decimal places is passed as argument too
     * they will be used to format the result
     *
     * @param integer|float $amount
     * @param integer|float $percent
     * @param integer $decimalPlaces
     *
     * @return float
     */
    public function calcPercent($amount, $percent, $decimalPlaces = null): float
    {
        $result = ($amount / 100) * $percent;
        return $this->round($result, $decimalPlaces);
    }
}