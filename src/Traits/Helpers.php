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
     * Round numbers
     *
     * The decimal places is optional argument, if it wasnt
     * informed the decimal places the value will be returned
     * as a float number without rounded
     *
     * @param float $number
     * @param integer|null $decimalPlaces
     *
     * @return float
     */
    public function round(float $number, $decimalPlaces = null): float
    {
        return is_null($decimalPlaces)
            ?  floatval($number)
            :  floatval(round($number, $decimalPlaces));
    }

    /**
     * Calculate the percent
     *
     * This method will calculate the percent value, using the amount and percent
     * passed as arguments of method
     *
     * @param integer|float $amount
     * @param integer|float $percent
     *
     * @return float
     */
    public function calcPercent($amount, $percent, $decimalPlaces = null): float
    {
        return ($amount / 100) * $percent;
    }
}