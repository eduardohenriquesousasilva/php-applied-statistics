<?php

include __DIR__ . '../../../Data/ExercisesProvider.php';

use drdhnrq\PhpAppliedStatistics\AppliedStatistics;
use PHPUnit\Framework\TestCase;

class ExercisesFrequencisTest extends TestCase
{
    /**
     * This test verifies if the qualitative frequency distribution is right calculated,
     *  this one use the ordered variables to show the data in the correct sequency
     *
     * @return void
     */
    public function testAttendanceSupermarket()
    {
        $appliedStatistic = new AppliedStatistics(4);
        $result = $appliedStatistic->qualitativeVariables(ExercisesProvider::attendanceSupermarket(), ['Ótimo', 'bom', 'Regular', 'Ruim']);

        // Test variables sequency
        $this->assertEquals('Ótimo', $result->rows[0]->variable);
        $this->assertEquals('Bom', $result->rows[1]->variable);
        $this->assertEquals('Regular', $result->rows[2]->variable);
        $this->assertEquals('Ruim', $result->rows[3]->variable);

        // Test frequencies
        $this->assertEquals(13, $result->rows[0]->frequency);
        $this->assertEquals(29, $result->rows[1]->frequency);
        $this->assertEquals(12, $result->rows[2]->frequency);
        $this->assertEquals(6, $result->rows[3]->frequency);

        // Test relative frequencies
        $this->assertEquals(0.2167, $result->rows[0]->relativeFrequency);
        $this->assertEquals(0.4833, $result->rows[1]->relativeFrequency);
        $this->assertEquals(0.2000, $result->rows[2]->relativeFrequency);
        $this->assertEquals(0.1000, $result->rows[3]->relativeFrequency);

        // Test percent relative frequency
        $this->assertEquals(21.67, $result->rows[0]->percentRelativeFrequency);
        $this->assertEquals(48.33, $result->rows[1]->percentRelativeFrequency);
        $this->assertEquals(20.00, $result->rows[2]->percentRelativeFrequency);
        $this->assertEquals(10.00, $result->rows[3]->percentRelativeFrequency);

        // Test accumulate frequencies
        $this->assertEquals(13, $result->rows[0]->accumulateFrequency);
        $this->assertEquals(42, $result->rows[1]->accumulateFrequency);
        $this->assertEquals(54, $result->rows[2]->accumulateFrequency);
        $this->assertEquals(60, $result->rows[3]->accumulateFrequency);

        // test acummulate relative frequencies
        $this->assertEquals(0.2167, $result->rows[0]->accumulateRelativeFrequency);
        $this->assertEquals(0.7000, $result->rows[1]->accumulateRelativeFrequency);
        $this->assertEquals(0.9000, $result->rows[2]->accumulateRelativeFrequency);
        $this->assertEquals(1.0000, $result->rows[3]->accumulateRelativeFrequency);

        // Test accumulate percent relative frequency
        $this->assertEquals(21.67, $result->rows[0]->accumulatePercentRelativeFrequency);
        $this->assertEquals(70.00, $result->rows[1]->accumulatePercentRelativeFrequency);
        $this->assertEquals(90.00, $result->rows[2]->accumulatePercentRelativeFrequency);
        $this->assertEquals(100.00, $result->rows[3]->accumulatePercentRelativeFrequency);

        // Test totals
        $this->assertEquals(60, $result->totals->frequency);
        $this->assertEquals(1.0, $result->totals->relativeFrequency);
        $this->assertEquals(100, $result->totals->percentRelativeFrequency);
    }

    /**
     * This test verifies if the quantitative frequency distribution is right calculated,
     *  this one won't use the class interval
     *
     * @return void
     */
    public function testNumberChildrenByFamily()
    {
        $appliedStatistic = new AppliedStatistics(5);
        $result = $appliedStatistic->quantitativeVariables(ExercisesProvider::numberChildrenByFamily());

        // Test variables sequency
        $this->assertEquals(0, $result->rows[0]->variable);
        $this->assertEquals(1, $result->rows[1]->variable);
        $this->assertEquals(2, $result->rows[2]->variable);
        $this->assertEquals(3, $result->rows[3]->variable);
        $this->assertEquals(4, $result->rows[4]->variable);

        // Test frequencies
        $this->assertEquals(4, $result->rows[0]->frequency);
        $this->assertEquals(8, $result->rows[1]->frequency);
        $this->assertEquals(10, $result->rows[2]->frequency);
        $this->assertEquals(6, $result->rows[3]->frequency);
        $this->assertEquals(2, $result->rows[4]->frequency);

        // Test relative frequencies
        $this->assertEquals(0.13333, $result->rows[0]->relativeFrequency);
        $this->assertEquals(0.26667, $result->rows[1]->relativeFrequency);
        $this->assertEquals(0.33333, $result->rows[2]->relativeFrequency);
        $this->assertEquals(0.20000, $result->rows[3]->relativeFrequency);
        $this->assertEquals(0.06667, $result->rows[4]->relativeFrequency);

        // Test percent relative frequency
        $this->assertEquals(13.333, $result->rows[0]->percentRelativeFrequency);
        $this->assertEquals(26.667, $result->rows[1]->percentRelativeFrequency);
        $this->assertEquals(33.333, $result->rows[2]->percentRelativeFrequency);
        $this->assertEquals(20.000, $result->rows[3]->percentRelativeFrequency);
        $this->assertEquals(6.667, $result->rows[4]->percentRelativeFrequency);

        // Test accumulate frequencies
        $this->assertEquals(4, $result->rows[0]->accumulateFrequency);
        $this->assertEquals(12, $result->rows[1]->accumulateFrequency);
        $this->assertEquals(22, $result->rows[2]->accumulateFrequency);
        $this->assertEquals(28, $result->rows[3]->accumulateFrequency);
        $this->assertEquals(30, $result->rows[4]->accumulateFrequency);

        // test acummulate relative frequencies
        $this->assertEquals(0.13333, $result->rows[0]->accumulateRelativeFrequency);
        $this->assertEquals(0.40000, $result->rows[1]->accumulateRelativeFrequency);
        $this->assertEquals(0.73333, $result->rows[2]->accumulateRelativeFrequency);
        $this->assertEquals(0.93333, $result->rows[3]->accumulateRelativeFrequency);
        $this->assertEquals(1.00000, $result->rows[4]->accumulateRelativeFrequency);

        // Test accumulate percent relative frequency
        $this->assertEquals(13.333, $result->rows[0]->accumulatePercentRelativeFrequency);
        $this->assertEquals(40.000, $result->rows[1]->accumulatePercentRelativeFrequency);
        $this->assertEquals(73.333, $result->rows[2]->accumulatePercentRelativeFrequency);
        $this->assertEquals(93.333, $result->rows[3]->accumulatePercentRelativeFrequency);
        $this->assertEquals(100.000, $result->rows[4]->accumulatePercentRelativeFrequency);

        // Test totals
        $this->assertEquals(30, $result->totals->frequency);
        $this->assertEquals(1.00000, $result->totals->relativeFrequency);
        $this->assertEquals(100.000, $result->totals->percentRelativeFrequency);
    }

    /**
     * This test verifies if the quantitative frequency distribution is right
     * calculated, this one won't use the class interval
     *
     * @return void
     */
    public function testInternshipsEconomyStudents()
    {
        $appliedStatistic = new AppliedStatistics(5);
        $result = $appliedStatistic->quantitativeVariables(ExercisesProvider::internshipsEconomyStudents());

        // Test variables sequency
        $this->assertEquals(1, $result->rows[0]->variable);
        $this->assertEquals(2, $result->rows[1]->variable);
        $this->assertEquals(3, $result->rows[2]->variable);
        $this->assertEquals(4, $result->rows[3]->variable);
        $this->assertEquals(5, $result->rows[4]->variable);

        // Test frequencies
        $this->assertEquals(32, $result->rows[0]->frequency);
        $this->assertEquals(43, $result->rows[1]->frequency);
        $this->assertEquals(87, $result->rows[2]->frequency);
        $this->assertEquals(113, $result->rows[3]->frequency);
        $this->assertEquals(25, $result->rows[4]->frequency);

        // Test relative frequencies
        $this->assertEquals(0.10667, $result->rows[0]->relativeFrequency);
        $this->assertEquals(0.14333, $result->rows[1]->relativeFrequency);
        $this->assertEquals(0.29000, $result->rows[2]->relativeFrequency);
        $this->assertEquals(0.37667, $result->rows[3]->relativeFrequency);
        $this->assertEquals(0.08333, $result->rows[4]->relativeFrequency);

        // Test percent relative frequency
        $this->assertEquals(10.667, $result->rows[0]->percentRelativeFrequency);
        $this->assertEquals(14.333, $result->rows[1]->percentRelativeFrequency);
        $this->assertEquals(29.000, $result->rows[2]->percentRelativeFrequency);
        $this->assertEquals(37.667, $result->rows[3]->percentRelativeFrequency);
        $this->assertEquals(08.333, $result->rows[4]->percentRelativeFrequency);

        // Test accumulate frequencies
        $this->assertEquals(32, $result->rows[0]->accumulateFrequency);
        $this->assertEquals(75, $result->rows[1]->accumulateFrequency);
        $this->assertEquals(162, $result->rows[2]->accumulateFrequency);
        $this->assertEquals(275, $result->rows[3]->accumulateFrequency);
        $this->assertEquals(300, $result->rows[4]->accumulateFrequency);

        // test acummulate relative frequencies
        $this->assertEquals(0.10667, $result->rows[0]->accumulateRelativeFrequency);
        $this->assertEquals(0.25000, $result->rows[1]->accumulateRelativeFrequency);
        $this->assertEquals(0.54000, $result->rows[2]->accumulateRelativeFrequency);
        $this->assertEquals(0.91667, $result->rows[3]->accumulateRelativeFrequency);
        $this->assertEquals(1.00000, $result->rows[4]->accumulateRelativeFrequency);

        // Test accumulate percent relative frequency
        $this->assertEquals(10.667, $result->rows[0]->accumulatePercentRelativeFrequency);
        $this->assertEquals(25.000, $result->rows[1]->accumulatePercentRelativeFrequency);
        $this->assertEquals(54.000, $result->rows[2]->accumulatePercentRelativeFrequency);
        $this->assertEquals(91.667, $result->rows[3]->accumulatePercentRelativeFrequency);
        $this->assertEquals(100.000, $result->rows[4]->accumulatePercentRelativeFrequency);

        // Test totals
        $this->assertEquals(300, $result->totals->frequency);
        $this->assertEquals(1.00000, $result->totals->relativeFrequency);
        $this->assertEquals(100.000, $result->totals->percentRelativeFrequency);
    }

    /**
     * This test verifies if the quantitative frequency distribution is right
     * calculated, this one won't use the class interval
     *
     * @return void
     */
    public function testUrgentAttendanceInHospital()
    {
        $appliedStatistic = new AppliedStatistics(5);
        $result = $appliedStatistic->quantitativeVariables(ExercisesProvider::urgentAttendanceInHospital());

        // Test variables sequency
        $this->assertEquals(1, $result->rows[0]->variable);
        $this->assertEquals(2, $result->rows[1]->variable);
        $this->assertEquals(3, $result->rows[2]->variable);
        $this->assertEquals(5, $result->rows[3]->variable);

        // Test frequencies
        $this->assertEquals(14, $result->rows[0]->frequency);
        $this->assertEquals(16, $result->rows[1]->frequency);
        $this->assertEquals(8, $result->rows[2]->frequency);
        $this->assertEquals(2, $result->rows[3]->frequency);

        // Test relative frequencies
        $this->assertEquals(0.35, $result->rows[0]->relativeFrequency);
        $this->assertEquals(0.40, $result->rows[1]->relativeFrequency);
        $this->assertEquals(0.20, $result->rows[2]->relativeFrequency);
        $this->assertEquals(0.05, $result->rows[3]->relativeFrequency);

        // Test percent relative frequency
        $this->assertEquals(35, $result->rows[0]->percentRelativeFrequency);
        $this->assertEquals(40, $result->rows[1]->percentRelativeFrequency);
        $this->assertEquals(20, $result->rows[2]->percentRelativeFrequency);
        $this->assertEquals(5, $result->rows[3]->percentRelativeFrequency);

        // Test accumulate frequencies
        $this->assertEquals(14, $result->rows[0]->accumulateFrequency);
        $this->assertEquals(30, $result->rows[1]->accumulateFrequency);
        $this->assertEquals(38, $result->rows[2]->accumulateFrequency);
        $this->assertEquals(40, $result->rows[3]->accumulateFrequency);

        // test acummulate relative frequencies
        $this->assertEquals(0.35, $result->rows[0]->accumulateRelativeFrequency);
        $this->assertEquals(0.75, $result->rows[1]->accumulateRelativeFrequency);
        $this->assertEquals(0.95, $result->rows[2]->accumulateRelativeFrequency);
        $this->assertEquals(1.00, $result->rows[3]->accumulateRelativeFrequency);

        // Test accumulate percent relative frequency
        $this->assertEquals(35, $result->rows[0]->accumulatePercentRelativeFrequency);
        $this->assertEquals(75, $result->rows[1]->accumulatePercentRelativeFrequency);
        $this->assertEquals(95, $result->rows[2]->accumulatePercentRelativeFrequency);
        $this->assertEquals(100, $result->rows[3]->accumulatePercentRelativeFrequency);

        // Test totals
        $this->assertEquals(40, $result->totals->frequency);
        $this->assertEquals(1.00000, $result->totals->relativeFrequency);
        $this->assertEquals(100.000, $result->totals->percentRelativeFrequency);
    }

    /**
     * This test verifies if the qualitative frequency distribution is right calculated,
     *  this one use the ordered variables to show the data in the correct sequency
     *
     * @return void
     */
    public function testOpinionAboutWhatColorIsCalmerAndQuieter()
    {
        $appliedStatistic = new AppliedStatistics(4);
        $result = $appliedStatistic->qualitativeVariables(
            ExercisesProvider::opinionAboutWhatColorIsCalmerAndQuieter(),
            ['azul Claro', 'bege', 'branco', 'rosa', 'amarelo']
        );

        // Test variables sequency
        $this->assertEquals('Azul claro', $result->rows[0]->variable);
        $this->assertEquals('Bege', $result->rows[1]->variable);
        $this->assertEquals('Branco', $result->rows[2]->variable);
        $this->assertEquals('Rosa', $result->rows[3]->variable);
        $this->assertEquals('Amarelo', $result->rows[4]->variable);

        // Test frequencies
        $this->assertEquals(7, $result->rows[0]->frequency);
        $this->assertEquals(5, $result->rows[1]->frequency);
        $this->assertEquals(8, $result->rows[2]->frequency);
        $this->assertEquals(3, $result->rows[3]->frequency);
        $this->assertEquals(7, $result->rows[4]->frequency);

        // Test relative frequencies
        $this->assertEquals(0.2333, $result->rows[0]->relativeFrequency);
        $this->assertEquals(0.1667, $result->rows[1]->relativeFrequency);
        $this->assertEquals(0.2667, $result->rows[2]->relativeFrequency);
        $this->assertEquals(0.1000, $result->rows[3]->relativeFrequency);
        $this->assertEquals(0.2333, $result->rows[4]->relativeFrequency);

        // Test percent relative frequency
        $this->assertEquals(23.33, $result->rows[0]->percentRelativeFrequency);
        $this->assertEquals(16.67, $result->rows[1]->percentRelativeFrequency);
        $this->assertEquals(26.67, $result->rows[2]->percentRelativeFrequency);
        $this->assertEquals(10.00, $result->rows[3]->percentRelativeFrequency);
        $this->assertEquals(23.33, $result->rows[4]->percentRelativeFrequency);

        // Test accumulate frequencies
        $this->assertEquals(7, $result->rows[0]->accumulateFrequency);
        $this->assertEquals(12, $result->rows[1]->accumulateFrequency);
        $this->assertEquals(20, $result->rows[2]->accumulateFrequency);
        $this->assertEquals(23, $result->rows[3]->accumulateFrequency);
        $this->assertEquals(30, $result->rows[4]->accumulateFrequency);

        // test acummulate relative frequencies
        $this->assertEquals(0.2333, $result->rows[0]->accumulateRelativeFrequency);
        $this->assertEquals(0.4000, $result->rows[1]->accumulateRelativeFrequency);
        $this->assertEquals(0.6667, $result->rows[2]->accumulateRelativeFrequency);
        $this->assertEquals(0.7667, $result->rows[3]->accumulateRelativeFrequency);
        $this->assertEquals(1.000, $result->rows[4]->accumulateRelativeFrequency);

        // Test accumulate percent relative frequency
        $this->assertEquals(23.33, $result->rows[0]->accumulatePercentRelativeFrequency);
        $this->assertEquals(40.00, $result->rows[1]->accumulatePercentRelativeFrequency);
        $this->assertEquals(66.67, $result->rows[2]->accumulatePercentRelativeFrequency);
        $this->assertEquals(76.67, $result->rows[3]->accumulatePercentRelativeFrequency);
        $this->assertEquals(100.00, $result->rows[4]->accumulatePercentRelativeFrequency);

        // Test totals
        $this->assertEquals(30, $result->totals->frequency);
        $this->assertEquals(1.0, $result->totals->relativeFrequency);
        $this->assertEquals(100.000, $result->totals->percentRelativeFrequency);
    }

    /**
     * This test verifies if the qualitative frequency distribution is right calculated,
     *  this one use the ordered variables to show the data in the correct sequency
     *
     * @return void
     */
    public function testCompaniesThatIntentionToCertifyIso9001()
    {
        $appliedStatistic = new AppliedStatistics(5);
        $result = $appliedStatistic->qualitativeVariables(
            ExercisesProvider::companiesThatIntentionToCertifyIso9001(),
            ['C', 'B', 'R', 'N', 'I']
        );

        // Test variables sequency
        $this->assertEquals('C', $result->rows[0]->variable);
        $this->assertEquals('B', $result->rows[1]->variable);
        $this->assertEquals('R', $result->rows[2]->variable);
        $this->assertEquals('N', $result->rows[3]->variable);
        $this->assertEquals('I', $result->rows[4]->variable);

        // Test frequencies
        $this->assertEquals(7, $result->rows[0]->frequency);
        $this->assertEquals(9, $result->rows[1]->frequency);
        $this->assertEquals(20, $result->rows[2]->frequency);
        $this->assertEquals(15, $result->rows[3]->frequency);
        $this->assertEquals(3, $result->rows[4]->frequency);

        // Test relative frequencies
        $this->assertEquals(0.12963, $result->rows[0]->relativeFrequency);
        $this->assertEquals(0.16667, $result->rows[1]->relativeFrequency);
        $this->assertEquals(0.37037, $result->rows[2]->relativeFrequency);
        $this->assertEquals(0.27778, $result->rows[3]->relativeFrequency);
        $this->assertEquals(0.05556, $result->rows[4]->relativeFrequency);

        // Test percent relative frequency
        $this->assertEquals(12.963, $result->rows[0]->percentRelativeFrequency);
        $this->assertEquals(16.667, $result->rows[1]->percentRelativeFrequency);
        $this->assertEquals(37.037, $result->rows[2]->percentRelativeFrequency);
        $this->assertEquals(27.778, $result->rows[3]->percentRelativeFrequency);
        $this->assertEquals(5.556, $result->rows[4]->percentRelativeFrequency);

        // Test accumulate frequencies
        $this->assertEquals(7, $result->rows[0]->accumulateFrequency);
        $this->assertEquals(16, $result->rows[1]->accumulateFrequency);
        $this->assertEquals(36, $result->rows[2]->accumulateFrequency);
        $this->assertEquals(51, $result->rows[3]->accumulateFrequency);
        $this->assertEquals(54, $result->rows[4]->accumulateFrequency);

        // test acummulate relative frequencies
        $this->assertEquals(0.12963, $result->rows[0]->accumulateRelativeFrequency);
        $this->assertEquals(0.29630, $result->rows[1]->accumulateRelativeFrequency);
        $this->assertEquals(0.66667, $result->rows[2]->accumulateRelativeFrequency);
        $this->assertEquals(0.94445, $result->rows[3]->accumulateRelativeFrequency);
        $this->assertEquals(1.00001, $result->rows[4]->accumulateRelativeFrequency);

        // Test accumulate percent relative frequency
        $this->assertEquals(12.963, $result->rows[0]->accumulatePercentRelativeFrequency);
        $this->assertEquals(29.630, $result->rows[1]->accumulatePercentRelativeFrequency);
        $this->assertEquals(66.667, $result->rows[2]->accumulatePercentRelativeFrequency);
        $this->assertEquals(94.445, $result->rows[3]->accumulatePercentRelativeFrequency);
        $this->assertEquals(100.001, $result->rows[4]->accumulatePercentRelativeFrequency);

        // Test totals
        $this->assertEquals(54, $result->totals->frequency);
        $this->assertEquals(1.00001, $result->totals->relativeFrequency);
        $this->assertEquals(100.001, $result->totals->percentRelativeFrequency);
    }

    /**
     * This test verifies if the qualitative frequency distribution is right calculated,
     *  this one use the ordered variables to show the data in the correct sequency
     *
     * @return void
     */
    public function testAmountTractorsSoldByMonth()
    {
        $appliedStatistic = new AppliedStatistics(5);
        $result = $appliedStatistic->qualitativeVariables(
            ExercisesProvider::amountTractorsSoldByMonth(),
            ['jan.', 'fev.', 'mar.', 'abr.', 'maio', 'jun.', 'jul.', 'ago.']
        );

        // Test variables sequency
        $this->assertEquals('Jan.', $result->rows[0]->variable);
        $this->assertEquals('Fev.', $result->rows[1]->variable);
        $this->assertEquals('Mar.', $result->rows[2]->variable);
        $this->assertEquals('Abr.', $result->rows[3]->variable);
        $this->assertEquals('Maio', $result->rows[4]->variable);
        $this->assertEquals('Jun.', $result->rows[5]->variable);
        $this->assertEquals('Jul.', $result->rows[6]->variable);
        $this->assertEquals('Ago.', $result->rows[7]->variable);

        // Test frequencies
        $this->assertEquals(163, $result->rows[0]->frequency);
        $this->assertEquals(115, $result->rows[1]->frequency);
        $this->assertEquals(136, $result->rows[2]->frequency);
        $this->assertEquals(129, $result->rows[3]->frequency);
        $this->assertEquals(98, $result->rows[4]->frequency);
        $this->assertEquals(147, $result->rows[5]->frequency);
        $this->assertEquals(130, $result->rows[6]->frequency);
        $this->assertEquals(104, $result->rows[7]->frequency);

        // Test relative frequencies
        $this->assertEquals(0.15949, $result->rows[0]->relativeFrequency);
        $this->assertEquals(0.11252, $result->rows[1]->relativeFrequency);
        $this->assertEquals(0.13307, $result->rows[2]->relativeFrequency);
        $this->assertEquals(0.12622, $result->rows[3]->relativeFrequency);
        $this->assertEquals(0.09589, $result->rows[4]->relativeFrequency);
        $this->assertEquals(0.14384, $result->rows[5]->relativeFrequency);
        $this->assertEquals(0.12720, $result->rows[6]->relativeFrequency);
        $this->assertEquals(0.10176, $result->rows[7]->relativeFrequency);

        // Test percent relative frequency
        $this->assertEquals(15.949, $result->rows[0]->percentRelativeFrequency);
        $this->assertEquals(11.252, $result->rows[1]->percentRelativeFrequency);
        $this->assertEquals(13.307, $result->rows[2]->percentRelativeFrequency);
        $this->assertEquals(12.622, $result->rows[3]->percentRelativeFrequency);
        $this->assertEquals(9.589, $result->rows[4]->percentRelativeFrequency);
        $this->assertEquals(14.384, $result->rows[5]->percentRelativeFrequency);
        $this->assertEquals(12.720, $result->rows[6]->percentRelativeFrequency);
        $this->assertEquals(10.176, $result->rows[7]->percentRelativeFrequency);

        // Test accumulate frequencies
        $this->assertEquals(163, $result->rows[0]->accumulateFrequency);
        $this->assertEquals(278, $result->rows[1]->accumulateFrequency);
        $this->assertEquals(414, $result->rows[2]->accumulateFrequency);
        $this->assertEquals(543, $result->rows[3]->accumulateFrequency);
        $this->assertEquals(641, $result->rows[4]->accumulateFrequency);
        $this->assertEquals(788, $result->rows[5]->accumulateFrequency);
        $this->assertEquals(918, $result->rows[6]->accumulateFrequency);
        $this->assertEquals(1022, $result->rows[7]->accumulateFrequency);

        // test acummulate relative frequencies
        $this->assertEquals(0.15949, $result->rows[0]->accumulateRelativeFrequency);
        $this->assertEquals(0.27201, $result->rows[1]->accumulateRelativeFrequency);
        $this->assertEquals(0.40508, $result->rows[2]->accumulateRelativeFrequency);
        $this->assertEquals(0.53130, $result->rows[3]->accumulateRelativeFrequency);
        $this->assertEquals(0.62719, $result->rows[4]->accumulateRelativeFrequency);
        $this->assertEquals(0.77103, $result->rows[5]->accumulateRelativeFrequency);
        $this->assertEquals(0.89823, $result->rows[6]->accumulateRelativeFrequency);
        $this->assertEquals(0.99999, $result->rows[7]->accumulateRelativeFrequency);

        // Test accumulate percent relative frequency
        $this->assertEquals(15.949, $result->rows[0]->accumulatePercentRelativeFrequency);
        $this->assertEquals(27.201, $result->rows[1]->accumulatePercentRelativeFrequency);
        $this->assertEquals(40.508, $result->rows[2]->accumulatePercentRelativeFrequency);
        $this->assertEquals(53.130, $result->rows[3]->accumulatePercentRelativeFrequency);
        $this->assertEquals(62.719, $result->rows[4]->accumulatePercentRelativeFrequency);
        $this->assertEquals(77.103, $result->rows[5]->accumulatePercentRelativeFrequency);
        $this->assertEquals(89.823, $result->rows[6]->accumulatePercentRelativeFrequency);
        $this->assertEquals(99.999, $result->rows[7]->accumulatePercentRelativeFrequency);

        // Test totals
        $this->assertEquals(1022, $result->totals->frequency);
        $this->assertEquals(0.99999, $result->totals->relativeFrequency);
        $this->assertEquals(99.999, $result->totals->percentRelativeFrequency);
    }

    /**
     * This test verifies if the quantitative frequency distribution is right
     * calculated, this one will use the class interval, and provide the interval
     * class as an argument of the method
     *
     * @return void
     */
    public function testStatureOfTeenager()
    {
        $appliedStatistic = new AppliedStatistics(2);
        $result = $appliedStatistic->quantitativeVariablesIntervalClass(ExercisesProvider::statureOfTeenager(), 3);

        // Test variables sequency
        $this->assertEquals('142 |-- 145', $result->rows[0]->descriptionClassInteval);
        $this->assertEquals('145 |-- 148', $result->rows[1]->descriptionClassInteval);
        $this->assertEquals('148 |-- 151', $result->rows[2]->descriptionClassInteval);
        $this->assertEquals('151 |-- 154', $result->rows[3]->descriptionClassInteval);
        $this->assertEquals('154 |-- 157', $result->rows[4]->descriptionClassInteval);
        $this->assertEquals('157 |-- 160', $result->rows[5]->descriptionClassInteval);
        $this->assertEquals('160 |-- 163', $result->rows[6]->descriptionClassInteval);

        // Test frequencies
        $this->assertEquals(3, $result->rows[0]->frequency);
        $this->assertEquals(3, $result->rows[1]->frequency);
        $this->assertEquals(7, $result->rows[2]->frequency);
        $this->assertEquals(8, $result->rows[3]->frequency);
        $this->assertEquals(14, $result->rows[4]->frequency);
        $this->assertEquals(9, $result->rows[5]->frequency);
        $this->assertEquals(6, $result->rows[6]->frequency);

        // Test midPoint
        $this->assertEquals(143.5, $result->rows[0]->midPoint);
        $this->assertEquals(146.5, $result->rows[1]->midPoint);
        $this->assertEquals(149.5, $result->rows[2]->midPoint);
        $this->assertEquals(152.5, $result->rows[3]->midPoint);
        $this->assertEquals(155.5, $result->rows[4]->midPoint);
        $this->assertEquals(158.5, $result->rows[5]->midPoint);
        $this->assertEquals(161.5, $result->rows[6]->midPoint);

        // Test relative frequencies
        $this->assertEquals(0.06, $result->rows[0]->relativeFrequency);
        $this->assertEquals(0.06, $result->rows[1]->relativeFrequency);
        $this->assertEquals(0.14, $result->rows[2]->relativeFrequency);
        $this->assertEquals(0.16, $result->rows[3]->relativeFrequency);
        $this->assertEquals(0.28, $result->rows[4]->relativeFrequency);
        $this->assertEquals(0.18, $result->rows[5]->relativeFrequency);
        $this->assertEquals(0.12, $result->rows[6]->relativeFrequency);

        // Test percent relative frequency
        $this->assertEquals(6, $result->rows[0]->percentRelativeFrequency);
        $this->assertEquals(6, $result->rows[1]->percentRelativeFrequency);
        $this->assertEquals(14, $result->rows[2]->percentRelativeFrequency);
        $this->assertEquals(16, $result->rows[3]->percentRelativeFrequency);
        $this->assertEquals(28, $result->rows[4]->percentRelativeFrequency);
        $this->assertEquals(18, $result->rows[5]->percentRelativeFrequency);
        $this->assertEquals(12, $result->rows[6]->percentRelativeFrequency);

        // Test accumulate frequencies
        $this->assertEquals(3, $result->rows[0]->accumulateFrequency);
        $this->assertEquals(6, $result->rows[1]->accumulateFrequency);
        $this->assertEquals(13, $result->rows[2]->accumulateFrequency);
        $this->assertEquals(21, $result->rows[3]->accumulateFrequency);
        $this->assertEquals(35, $result->rows[4]->accumulateFrequency);
        $this->assertEquals(44, $result->rows[5]->accumulateFrequency);
        $this->assertEquals(50, $result->rows[6]->accumulateFrequency);

        // test acummulate relative frequencies
        $this->assertEquals(0.06, $result->rows[0]->accumulateRelativeFrequency);
        $this->assertEquals(0.12, $result->rows[1]->accumulateRelativeFrequency);
        $this->assertEquals(0.26, $result->rows[2]->accumulateRelativeFrequency);
        $this->assertEquals(0.42, $result->rows[3]->accumulateRelativeFrequency);
        $this->assertEquals(0.70, $result->rows[4]->accumulateRelativeFrequency);
        $this->assertEquals(0.88, $result->rows[5]->accumulateRelativeFrequency);
        $this->assertEquals(1.00, $result->rows[6]->accumulateRelativeFrequency);

        // Test accumulate percent relative frequency
        $this->assertEquals(6, $result->rows[0]->accumulatePercentRelativeFrequency);
        $this->assertEquals(12, $result->rows[1]->accumulatePercentRelativeFrequency);
        $this->assertEquals(26, $result->rows[2]->accumulatePercentRelativeFrequency);
        $this->assertEquals(42, $result->rows[3]->accumulatePercentRelativeFrequency);
        $this->assertEquals(70, $result->rows[4]->accumulatePercentRelativeFrequency);
        $this->assertEquals(88, $result->rows[5]->accumulatePercentRelativeFrequency);
        $this->assertEquals(100, $result->rows[6]->accumulatePercentRelativeFrequency);

        // Test totals
        $this->assertEquals(50, $result->totals->frequency);
        $this->assertEquals(1.00, $result->totals->relativeFrequency);
        $this->assertEquals(100.00, $result->totals->percentRelativeFrequency);
    }


    /**
     * This test verifies if the quantitative frequency distribution is right
     * calculated, this one will use the class interval, and provide the interval
     * class as an argument of the method
     *
     * @return void
     */
    public function testHubcapProductionInFactory()
    {
        $appliedStatistic = new AppliedStatistics(4);
        $result = $appliedStatistic->quantitativeVariablesIntervalClass(ExercisesProvider::hubcapProductionInFactory(), 20);

        // Test variables sequency
        $this->assertEquals('230 |-- 250', $result->rows[0]->descriptionClassInteval);
        $this->assertEquals('250 |-- 270', $result->rows[1]->descriptionClassInteval);
        $this->assertEquals('270 |-- 290', $result->rows[2]->descriptionClassInteval);
        $this->assertEquals('290 |-- 310', $result->rows[3]->descriptionClassInteval);
        $this->assertEquals('310 |-- 330', $result->rows[4]->descriptionClassInteval);
        $this->assertEquals('330 |-- 350', $result->rows[5]->descriptionClassInteval);
        $this->assertEquals('350 |-- 370', $result->rows[6]->descriptionClassInteval);

        // Test frequencies
        $this->assertEquals(6, $result->rows[0]->frequency);
        $this->assertEquals(5, $result->rows[1]->frequency);
        $this->assertEquals(8, $result->rows[2]->frequency);
        $this->assertEquals(14, $result->rows[3]->frequency);
        $this->assertEquals(12, $result->rows[4]->frequency);
        $this->assertEquals(11, $result->rows[5]->frequency);
        $this->assertEquals(4, $result->rows[6]->frequency);

        // Test relative frequencies
        $this->assertEquals(0.1000, $result->rows[0]->relativeFrequency);
        $this->assertEquals(0.0833, $result->rows[1]->relativeFrequency);
        $this->assertEquals(0.1333, $result->rows[2]->relativeFrequency);
        $this->assertEquals(0.2333, $result->rows[3]->relativeFrequency);
        $this->assertEquals(0.2000, $result->rows[4]->relativeFrequency);
        $this->assertEquals(0.1833, $result->rows[5]->relativeFrequency);
        $this->assertEquals(0.0667, $result->rows[6]->relativeFrequency);

        // Test accumulate frequencies
        $this->assertEquals(6, $result->rows[0]->accumulateFrequency);
        $this->assertEquals(11, $result->rows[1]->accumulateFrequency);
        $this->assertEquals(19, $result->rows[2]->accumulateFrequency);
        $this->assertEquals(33, $result->rows[3]->accumulateFrequency);
        $this->assertEquals(45, $result->rows[4]->accumulateFrequency);
        $this->assertEquals(56, $result->rows[5]->accumulateFrequency);
        $this->assertEquals(60, $result->rows[6]->accumulateFrequency);

        // test acummulate relative frequencies
        $this->assertEquals(0.1000, $result->rows[0]->accumulateRelativeFrequency);
        $this->assertEquals(0.1833, $result->rows[1]->accumulateRelativeFrequency);
        $this->assertEquals(0.3166, $result->rows[2]->accumulateRelativeFrequency);
        $this->assertEquals(0.5499, $result->rows[3]->accumulateRelativeFrequency);
        $this->assertEquals(0.7499, $result->rows[4]->accumulateRelativeFrequency);
        $this->assertEquals(0.9332, $result->rows[5]->accumulateRelativeFrequency);
        $this->assertEquals(0.9999, $result->rows[6]->accumulateRelativeFrequency);

        // Test totals
        $this->assertEquals(60, $result->totals->frequency);
        $this->assertEquals(0.9999, $result->totals->relativeFrequency);
        $this->assertEquals(99.99, $result->totals->percentRelativeFrequency);
    }

    /**
     * This test verifies if the quantitative frequency distribution is right
     * calculated, this one will use the class interval, and provide the interval
     * class as an argument of the method
     *
     * @return void
     */
    public function testExpenditureEnergyByMonth()
    {
        $appliedStatistic = new AppliedStatistics(3);
        $result = $appliedStatistic->quantitativeVariablesIntervalClass(ExercisesProvider::expenditureEnergyByMonth(), 40);

        // Test variables sequency
        $this->assertEquals('180 |-- 220', $result->rows[0]->descriptionClassInteval);
        $this->assertEquals('220 |-- 260', $result->rows[1]->descriptionClassInteval);
        $this->assertEquals('260 |-- 300', $result->rows[2]->descriptionClassInteval);
        $this->assertEquals('300 |-- 340', $result->rows[3]->descriptionClassInteval);
        $this->assertEquals('340 |-- 380', $result->rows[4]->descriptionClassInteval);
        $this->assertEquals('380 |-- 420', $result->rows[5]->descriptionClassInteval);

        // Test frequencies
        $this->assertEquals(3, $result->rows[0]->frequency);
        $this->assertEquals(2, $result->rows[1]->frequency);
        $this->assertEquals(4, $result->rows[2]->frequency);
        $this->assertEquals(14, $result->rows[3]->frequency);
        $this->assertEquals(10, $result->rows[4]->frequency);
        $this->assertEquals(7, $result->rows[5]->frequency);

        // Test midPoint
        $this->assertEquals(200, $result->rows[0]->midPoint);
        $this->assertEquals(240, $result->rows[1]->midPoint);
        $this->assertEquals(280, $result->rows[2]->midPoint);
        $this->assertEquals(320, $result->rows[3]->midPoint);
        $this->assertEquals(360, $result->rows[4]->midPoint);
        $this->assertEquals(400, $result->rows[5]->midPoint);

        // Test relative frequencies
        $this->assertEquals(0.075, $result->rows[0]->relativeFrequency);
        $this->assertEquals(0.050, $result->rows[1]->relativeFrequency);
        $this->assertEquals(0.100, $result->rows[2]->relativeFrequency);
        $this->assertEquals(0.350, $result->rows[3]->relativeFrequency);
        $this->assertEquals(0.250, $result->rows[4]->relativeFrequency);
        $this->assertEquals(0.175, $result->rows[5]->relativeFrequency);

        // Test percent relative frequency
        $this->assertEquals(7.5, $result->rows[0]->percentRelativeFrequency);
        $this->assertEquals(5.0, $result->rows[1]->percentRelativeFrequency);
        $this->assertEquals(10.0, $result->rows[2]->percentRelativeFrequency);
        $this->assertEquals(35.0, $result->rows[3]->percentRelativeFrequency);
        $this->assertEquals(25.0, $result->rows[4]->percentRelativeFrequency);
        $this->assertEquals(17.5, $result->rows[5]->percentRelativeFrequency);

        // Test accumulate frequencies
        $this->assertEquals(3, $result->rows[0]->accumulateFrequency);
        $this->assertEquals(5, $result->rows[1]->accumulateFrequency);
        $this->assertEquals(9, $result->rows[2]->accumulateFrequency);
        $this->assertEquals(23, $result->rows[3]->accumulateFrequency);
        $this->assertEquals(33, $result->rows[4]->accumulateFrequency);
        $this->assertEquals(40, $result->rows[5]->accumulateFrequency);

        // test acummulate relative frequencies
        $this->assertEquals(0.075, $result->rows[0]->accumulateRelativeFrequency);
        $this->assertEquals(0.125, $result->rows[1]->accumulateRelativeFrequency);
        $this->assertEquals(0.225, $result->rows[2]->accumulateRelativeFrequency);
        $this->assertEquals(0.575, $result->rows[3]->accumulateRelativeFrequency);
        $this->assertEquals(0.825, $result->rows[4]->accumulateRelativeFrequency);
        $this->assertEquals(1.000, $result->rows[5]->accumulateRelativeFrequency);

        // Test accumulate percent relative frequency
        $this->assertEquals(7.5, $result->rows[0]->accumulatePercentRelativeFrequency);
        $this->assertEquals(12.5, $result->rows[1]->accumulatePercentRelativeFrequency);
        $this->assertEquals(22.5, $result->rows[2]->accumulatePercentRelativeFrequency);
        $this->assertEquals(57.5, $result->rows[3]->accumulatePercentRelativeFrequency);
        $this->assertEquals(82.5, $result->rows[4]->accumulatePercentRelativeFrequency);
        $this->assertEquals(100.0, $result->rows[5]->accumulatePercentRelativeFrequency);

        // Test totals
        $this->assertEquals(40, $result->totals->frequency);
        $this->assertEquals(1.00, $result->totals->relativeFrequency);
        $this->assertEquals(100.00, $result->totals->percentRelativeFrequency);
    }
}