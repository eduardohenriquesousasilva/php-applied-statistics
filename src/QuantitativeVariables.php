<?php

namespace drdhnrq\PhpAppliedStatistics;

use StdClass;
use drdhnrq\PhpAppliedStatistics\FrequencyDistribution;
use drdhnrq\PhpAppliedStatistics\Exceptions\DataIsEmpty;
use drdhnrq\PhpAppliedStatistics\Exceptions\DataIsnotOrdered;
use drdhnrq\PhpAppliedStatistics\Exceptions\ClassNumberIsNotDefined;
use drdhnrq\PhpAppliedStatistics\Exceptions\BreadthSampleIsNotDefined;
use drdhnrq\PhpAppliedStatistics\Exceptions\IntervalClassIsNotDefined;

class QuantitativeVariables extends FrequencyDistribution
{
    /**
     * This property will have the number of classes that
     * will use to calculate the frequency distribution
     * [Número de Classes] (k)
     *
     * @var integer
     */
    public $classNumber;

    /**
     * This property will have the breadth sample that is the difference of
     * bigger value contained in data, subtracted the smaller value contained
     * in data
     * [Amplitude Amostral] (AA)
     *
     * @var integer
     */
    public $breadthSample;

    /**
     * This property will have the breadth interval class that is the limit
     * value of a data to be added in a class
     * [Amplitude de Classe] (h)
     *
     * @var integer
     */
    public $intervalClass;

    /**
     * This property will have the definitions of classes breaks that were
     * defined to calculate de frequency distribution
     *
     * @var array
     */
    public $classBreaks;

    public function __construct(array $data = [], int $decimalPlaces = null)
    {
        parent::__construct($data, $decimalPlaces);
    }

    /**
     * This methods will define the number of the classes that
     * the frequency distribution will have, this is used only
     * the data contains the many numbers with many variations
     * [Definir Número de Classes] (k)
     *
     * @return integer
     */
    public function setClassNumber(): int
    {
        $countData = count($this->data);

        if (!$countData) {
            throw new DataIsEmpty();
        }

        $numberClass = ($countData <= 50)
            ? $this->round(sqrt($countData), 0)
            : $this->round(1 + (3.322 * log10($countData)), 0);

        return $this->classNumber = intval($numberClass);
    }

    /**
     * This method will define the breadth sample that is
     * the difference of the bigger value of the data with
     * the smaller value of the data, it is necessary to
     * define the class intervals and it will be used only
     * the data contains many number with many variations
     * [Definir Amplitude Amostral] (AA)
     *
     * @return integer
     */
    public function setBreadthSample(): int
    {
        if (!$this->data) {
            throw new DataIsEmpty();
        }

        $cloneDataSorted = $this->data;
        sort($cloneDataSorted);

        if ($this->data !== $cloneDataSorted) {
            throw new DataIsnotOrdered();
        }

        // The bigger value - smaller value
        return $this->breadthSample = intval(end($this->data) -  $this->data[0]);
    }

    /**
     * This method will set the class interval, this value will used
     * to define de values limits of classes
     * [Definir Amplitude de classe] (h)
     *
     * @return float
     */
    public function setIntervalClass(): float
    {
        if (is_null($this->breadthSample)) {
            throw new BreadthSampleIsNotDefined();
        }

        if (is_null($this->classNumber)) {
            throw new ClassNumberIsNotDefined();
        }

        return $this->intervalClass = $this->round(
            ($this->breadthSample / $this->classNumber),
            $this->decimalPlaces
        );
    }

    /**
     * This method will defined the class breaks, they are
     * used to calculate and to define the frequencies when the
     * quantitative variables are a many data variations
     *
     * @return array
     */
    public function setClassBreaks(): array
    {
        if (!$this->data) {
            throw new DataIsEmpty();
        }

        $cloneDataSorted = $this->data;
        sort($cloneDataSorted);

        if ($this->data !== $cloneDataSorted) {
            throw new DataIsnotOrdered();
        }

        if (is_null($this->classNumber)) {
            throw new ClassNumberIsNotDefined();
        }

        if (is_null($this->intervalClass)) {
            throw new IntervalClassIsNotDefined();
        }

        $lessLimitClass = $this->data[0];
        $upperLimitClass = 0;
        $classNumber = 0;

        do {
            $classNumber++;
            $upperLimitClass = ($lessLimitClass + $this->intervalClass);

            $this->classBreaks[$classNumber] = (object) [
                'lessLimit' => $lessLimitClass,
                'upperLimit' => $upperLimitClass,
                'description' => $lessLimitClass . ' |-- ' . $upperLimitClass,
                'class' => $classNumber,
            ];

            $lessLimitClass = $upperLimitClass;

        } while ($classNumber < $this->classNumber);

        return $this->classBreaks;
    }
}