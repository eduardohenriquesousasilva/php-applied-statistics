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
}