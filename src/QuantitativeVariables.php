<?php

namespace drdhnrq\PhpAppliedStatistics;

use StdClass;
use drdhnrq\PhpAppliedStatistics\FrequencyDistribution;

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
        $this->validationRequirements(['data']);

        $countData = count($this->data);

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
        $this->validationRequirements(['data', 'orderedData']);

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
        $this->validationRequirements(['breadthSample', 'classNumber']);

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
        $this->validationRequirements([
            'data',
            'orderedData',
            'classNumber',
            'classInterval'
        ]);

        $lessLimitClass = $this->round($this->data[0], $this->decimalPlaces);
        $upperLimitClass = 0;
        $classNumber = 0;

        do {
            $classNumber++;
            $upperLimitClass = $this->round(($lessLimitClass + $this->intervalClass), $this->decimalPlaces);

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

    /**
     * This method will set the desciption class interval in the
     * frequencies, this attribute will be used to show informations
     * about interval class that were defineds
     *
     * @return array
     */
    public function setDescriptionClasIntervalInFrequency(): array
    {
        $this->validationRequirements(['classBreaks']);

        foreach ($this->classBreaks as $classBreack) {
            $this->frequencies[$classBreack->class] = (object) [
                'descriptionClassInteval' => $classBreack->description
            ];
        }

        return $this->frequencies;
    }

    /**
     * This method will calculate the average point in the class
     * interval
     *
     * @return array
     */
    public function setMidPointInFrequencies(): array
    {
        $this->validationRequirements(['descriptionClassIntervals']);

        foreach ($this->classBreaks as $classBreack) {
            $midPoint = ($classBreack->lessLimit + $classBreack->upperLimit) / 2;
            $this->frequencies[$classBreack->class]->midPoint = $this->round(
                $midPoint,
                $this->decimalPlaces
            );
        }

        return $this->frequencies;
    }

    /**
     * This method will calculate the frequencies using the class intervals
     * that were defineds, this method respect the statistics rules to put
     * a value in the class interval
     *
     * @return array
     */
    public function setFrequenciesByClassInterval(): array
    {
        $this->validationRequirements([
            'data',
            'orderedData',
            'classBreaks',
            'descriptionClassIntervals',
        ]);

        foreach ($this->classBreaks as $classBreack) {
            $this->frequencies[$classBreack->class]->frequency = 0;

            foreach ($this->data as $value) {
                // jump values that are smaller less limit of class interval
                if ($value < $classBreack->lessLimit) {
                    continue;
                }

                // If doesn't jump the value will be increment here
                $this->frequencies[$classBreack->class]->frequency += 1;

                // In cases that the value is bigger than upper limit class interval
                // will be need decrement the value and stop the loop
                if ($value >= $classBreack->upperLimit) {
                    $this->frequencies[$classBreack->class]->frequency -= 1;
                    break;
                }
            }
        }

        return $this->frequencies;
    }

    /**
     * Default method to calculate frequency distribution,
     * this method will call the correct method to calculate
     * the frequency using the class intervals or no
     *
     * @param bool|null $useClassInterval
     * @return StdClass
     */
    public function calculate($useClassInterval = null): StdClass
    {
        $countClassForData = count(array_unique($this->data));
        // Determine if necessary use class interval or no
        $useClassInterval = is_null($useClassInterval)
            ? ($countClassForData > 10)
            : $useClassInterval;

        if (!$useClassInterval) {
            return $this->calculateSimpleFrequency();
        }

        return $this->calculateClassIntervalFrequency();
    }

    /**
     * This method will caculate the frequency distribution
     * using the methods that aren't need the use class intervals
     *
     * @return StdClass
     */
    public function calculateSimpleFrequency(): StdClass
    {
        $this->sortData();
        $this->setVariablesFrequency();
        $this->setFrequencies();
        $this->setRelativeFrequencies();
        $this->setPercentRelativeFrequencies();
        $this->setAccumulateFrequencies();
        $this->setAccumulateRelativeFrequencies();
        $this->setPercentAccumulateRelativeFrequencies();

        return $this->setResults();
    }

    /**
     * This method will calculate the frequency distribution
     * using the methods to apply the class intervals, the class
     * intervals can be provide as argument in this method
     *
     * @param integer|float $intervalClass
     * @return StdClass
     */
    public function calculateClassIntervalFrequency($intervalClass = null): StdClass
    {
        $this->sortData();
        $this->setClassNumber();
        $this->setBreadthSample();

        $this->intervalClass = !is_null($intervalClass)
            ? $intervalClass
            : $this->setIntervalClass();

        $this->setClassBreaks();
        $this->setDescriptionClasIntervalInFrequency();
        $this->setMidPointInFrequencies();
        $this->setFrequenciesByClassInterval();
        $this->setRelativeFrequencies();
        $this->setPercentRelativeFrequencies();
        $this->setAccumulateFrequencies();
        $this->setAccumulateRelativeFrequencies();
        $this->setPercentAccumulateRelativeFrequencies();

        return $this->setResults();
    }
}