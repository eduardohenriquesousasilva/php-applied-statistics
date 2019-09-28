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
        $this->assertEquals('Ótimo', $result['Ótimo']->variable);
        $this->assertEquals('Bom', $result['Bom']->variable);
        $this->assertEquals('Regular', $result['Regular']->variable);
        $this->assertEquals('Ruim', $result['Ruim']->variable);

        // Test frequencies
        $this->assertEquals(13, $result['Ótimo']->frequency);
        $this->assertEquals(29, $result['Bom']->frequency);
        $this->assertEquals(12, $result['Regular']->frequency);
        $this->assertEquals(6, $result['Ruim']->frequency);

        // Test relative frequencies
        $this->assertEquals(0.2167, $result['Ótimo']->relativeFrequency);
        $this->assertEquals(0.4833, $result['Bom']->relativeFrequency);
        $this->assertEquals(0.2000, $result['Regular']->relativeFrequency);
        $this->assertEquals(0.1000, $result['Ruim']->relativeFrequency);

        // Test percent relative frequency
        $this->assertEquals(21.67, $result['Ótimo']->percentRelativeFrequency);
        $this->assertEquals(48.33, $result['Bom']->percentRelativeFrequency);
        $this->assertEquals(20.00, $result['Regular']->percentRelativeFrequency);
        $this->assertEquals(10.00, $result['Ruim']->percentRelativeFrequency);

        // Test accumulate frequencies
        $this->assertEquals(13, $result['Ótimo']->accumulateFrequency);
        $this->assertEquals(42, $result['Bom']->accumulateFrequency);
        $this->assertEquals(54, $result['Regular']->accumulateFrequency);
        $this->assertEquals(60, $result['Ruim']->accumulateFrequency);

        // test acummulate relative frequencies
        $this->assertEquals(0.2167, $result['Ótimo']->accumulateRelativeFrequency);
        $this->assertEquals(0.7000, $result['Bom']->accumulateRelativeFrequency);
        $this->assertEquals(0.9000, $result['Regular']->accumulateRelativeFrequency);
        $this->assertEquals(1.0000, $result['Ruim']->accumulateRelativeFrequency);

        // Test accumulate percent relative frequency
        $this->assertEquals(21.67, $result['Ótimo']->accumulatePercentRelativeFrequency);
        $this->assertEquals(70.00, $result['Bom']->accumulatePercentRelativeFrequency);
        $this->assertEquals(90.00, $result['Regular']->accumulatePercentRelativeFrequency);
        $this->assertEquals(100.00, $result['Ruim']->accumulatePercentRelativeFrequency);
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
        $this->assertEquals(0, $result[0]->variable);
        $this->assertEquals(1, $result[1]->variable);
        $this->assertEquals(2, $result[2]->variable);
        $this->assertEquals(3, $result[3]->variable);
        $this->assertEquals(4, $result[4]->variable);

        // Test frequencies
        $this->assertEquals(4, $result[0]->frequency);
        $this->assertEquals(8, $result[1]->frequency);
        $this->assertEquals(10, $result[2]->frequency);
        $this->assertEquals(6, $result[3]->frequency);
        $this->assertEquals(2, $result[4]->frequency);

        // Test relative frequencies
        $this->assertEquals(0.13333, $result[0]->relativeFrequency);
        $this->assertEquals(0.26667, $result[1]->relativeFrequency);
        $this->assertEquals(0.33333, $result[2]->relativeFrequency);
        $this->assertEquals(0.20000, $result[3]->relativeFrequency);
        $this->assertEquals(0.06667, $result[4]->relativeFrequency);

        // Test percent relative frequency
        $this->assertEquals(13.333, $result[0]->percentRelativeFrequency);
        $this->assertEquals(26.667, $result[1]->percentRelativeFrequency);
        $this->assertEquals(33.333, $result[2]->percentRelativeFrequency);
        $this->assertEquals(20.000, $result[3]->percentRelativeFrequency);
        $this->assertEquals(6.667, $result[4]->percentRelativeFrequency);

        // Test accumulate frequencies
        $this->assertEquals(4, $result[0]->accumulateFrequency);
        $this->assertEquals(12, $result[1]->accumulateFrequency);
        $this->assertEquals(22, $result[2]->accumulateFrequency);
        $this->assertEquals(28, $result[3]->accumulateFrequency);
        $this->assertEquals(30, $result[4]->accumulateFrequency);

        // test acummulate relative frequencies
        $this->assertEquals(0.13333, $result[0]->accumulateRelativeFrequency);
        $this->assertEquals(0.40000, $result[1]->accumulateRelativeFrequency);
        $this->assertEquals(0.73333, $result[2]->accumulateRelativeFrequency);
        $this->assertEquals(0.93333, $result[3]->accumulateRelativeFrequency);
        $this->assertEquals(1.00000, $result[4]->accumulateRelativeFrequency);

        // Test accumulate percent relative frequency
        $this->assertEquals(13.333, $result[0]->accumulatePercentRelativeFrequency);
        $this->assertEquals(40.000, $result[1]->accumulatePercentRelativeFrequency);
        $this->assertEquals(73.333, $result[2]->accumulatePercentRelativeFrequency);
        $this->assertEquals(93.333, $result[3]->accumulatePercentRelativeFrequency);
        $this->assertEquals(100.000, $result[4]->accumulatePercentRelativeFrequency);
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
        $this->assertEquals(1, $result[1]->variable);
        $this->assertEquals(2, $result[2]->variable);
        $this->assertEquals(3, $result[3]->variable);
        $this->assertEquals(4, $result[4]->variable);
        $this->assertEquals(5, $result[5]->variable);

        // Test frequencies
        $this->assertEquals(32, $result[1]->frequency);
        $this->assertEquals(43, $result[2]->frequency);
        $this->assertEquals(87, $result[3]->frequency);
        $this->assertEquals(113, $result[4]->frequency);
        $this->assertEquals(25, $result[5]->frequency);

        // Test relative frequencies
        $this->assertEquals(0.10667, $result[1]->relativeFrequency);
        $this->assertEquals(0.14333, $result[2]->relativeFrequency);
        $this->assertEquals(0.29000, $result[3]->relativeFrequency);
        $this->assertEquals(0.37667, $result[4]->relativeFrequency);
        $this->assertEquals(0.08333, $result[5]->relativeFrequency);

        // Test percent relative frequency
        $this->assertEquals(10.667, $result[1]->percentRelativeFrequency);
        $this->assertEquals(14.333, $result[2]->percentRelativeFrequency);
        $this->assertEquals(29.000, $result[3]->percentRelativeFrequency);
        $this->assertEquals(37.667, $result[4]->percentRelativeFrequency);
        $this->assertEquals(08.333, $result[5]->percentRelativeFrequency);

        // Test accumulate frequencies
        $this->assertEquals(32, $result[1]->accumulateFrequency);
        $this->assertEquals(75, $result[2]->accumulateFrequency);
        $this->assertEquals(162, $result[3]->accumulateFrequency);
        $this->assertEquals(275, $result[4]->accumulateFrequency);
        $this->assertEquals(300, $result[5]->accumulateFrequency);

        // test acummulate relative frequencies
        $this->assertEquals(0.10667, $result[1]->accumulateRelativeFrequency);
        $this->assertEquals(0.25000, $result[2]->accumulateRelativeFrequency);
        $this->assertEquals(0.54000, $result[3]->accumulateRelativeFrequency);
        $this->assertEquals(0.91667, $result[4]->accumulateRelativeFrequency);
        $this->assertEquals(1.00000, $result[5]->accumulateRelativeFrequency);

        // Test accumulate percent relative frequency
        $this->assertEquals(10.667, $result[1]->accumulatePercentRelativeFrequency);
        $this->assertEquals(25.000, $result[2]->accumulatePercentRelativeFrequency);
        $this->assertEquals(54.000, $result[3]->accumulatePercentRelativeFrequency);
        $this->assertEquals(91.667, $result[4]->accumulatePercentRelativeFrequency);
        $this->assertEquals(100.000, $result[5]->accumulatePercentRelativeFrequency);
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
        $this->assertEquals(1, $result[1]->variable);
        $this->assertEquals(2, $result[2]->variable);
        $this->assertEquals(3, $result[3]->variable);
        $this->assertEquals(5, $result[5]->variable);

        // Test frequencies
        $this->assertEquals(14, $result[1]->frequency);
        $this->assertEquals(16, $result[2]->frequency);
        $this->assertEquals(8, $result[3]->frequency);
        $this->assertEquals(2, $result[5]->frequency);

        // Test relative frequencies
        $this->assertEquals(0.35, $result[1]->relativeFrequency);
        $this->assertEquals(0.40, $result[2]->relativeFrequency);
        $this->assertEquals(0.20, $result[3]->relativeFrequency);
        $this->assertEquals(0.05, $result[5]->relativeFrequency);

        // Test percent relative frequency
        $this->assertEquals(35, $result[1]->percentRelativeFrequency);
        $this->assertEquals(40, $result[2]->percentRelativeFrequency);
        $this->assertEquals(20, $result[3]->percentRelativeFrequency);
        $this->assertEquals(5, $result[5]->percentRelativeFrequency);

        // Test accumulate frequencies
        $this->assertEquals(14, $result[1]->accumulateFrequency);
        $this->assertEquals(30, $result[2]->accumulateFrequency);
        $this->assertEquals(38, $result[3]->accumulateFrequency);
        $this->assertEquals(40, $result[5]->accumulateFrequency);

        // test acummulate relative frequencies
        $this->assertEquals(0.35, $result[1]->accumulateRelativeFrequency);
        $this->assertEquals(0.75, $result[2]->accumulateRelativeFrequency);
        $this->assertEquals(0.95, $result[3]->accumulateRelativeFrequency);
        $this->assertEquals(1.00, $result[5]->accumulateRelativeFrequency);

        // Test accumulate percent relative frequency
        $this->assertEquals(35, $result[1]->accumulatePercentRelativeFrequency);
        $this->assertEquals(75, $result[2]->accumulatePercentRelativeFrequency);
        $this->assertEquals(95, $result[3]->accumulatePercentRelativeFrequency);
        $this->assertEquals(100, $result[5]->accumulatePercentRelativeFrequency);
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
            ['Azul claro', 'bege', 'branco', 'rosa', 'amarelo']
        );

        // Test variables sequency
        $this->assertEquals('Azul claro', $result['Azul claro']->variable);
        $this->assertEquals('Bege', $result['Bege']->variable);
        $this->assertEquals('Branco', $result['Branco']->variable);
        $this->assertEquals('Rosa', $result['Rosa']->variable);
        $this->assertEquals('Amarelo', $result['Amarelo']->variable);

        // Test frequencies
        $this->assertEquals(7, $result['Azul claro']->frequency);
        $this->assertEquals(5, $result['Bege']->frequency);
        $this->assertEquals(8, $result['Branco']->frequency);
        $this->assertEquals(3, $result['Rosa']->frequency);
        $this->assertEquals(7, $result['Amarelo']->frequency);

        // Test relative frequencies
        $this->assertEquals(0.2333, $result['Azul claro']->relativeFrequency);
        $this->assertEquals(0.1667, $result['Bege']->relativeFrequency);
        $this->assertEquals(0.2667, $result['Branco']->relativeFrequency);
        $this->assertEquals(0.1000, $result['Rosa']->relativeFrequency);
        $this->assertEquals(0.2333, $result['Amarelo']->relativeFrequency);

        // Test percent relative frequency
        $this->assertEquals(23.33, $result['Azul claro']->percentRelativeFrequency);
        $this->assertEquals(16.67, $result['Bege']->percentRelativeFrequency);
        $this->assertEquals(26.67, $result['Branco']->percentRelativeFrequency);
        $this->assertEquals(10.00, $result['Rosa']->percentRelativeFrequency);
        $this->assertEquals(23.33, $result['Amarelo']->percentRelativeFrequency);

        // Test accumulate frequencies
        $this->assertEquals(7, $result['Azul claro']->accumulateFrequency);
        $this->assertEquals(12, $result['Bege']->accumulateFrequency);
        $this->assertEquals(20, $result['Branco']->accumulateFrequency);
        $this->assertEquals(23, $result['Rosa']->accumulateFrequency);
        $this->assertEquals(30, $result['Amarelo']->accumulateFrequency);

        // test acummulate relative frequencies
        $this->assertEquals(0.2333, $result['Azul claro']->accumulateRelativeFrequency);
        $this->assertEquals(0.4000, $result['Bege']->accumulateRelativeFrequency);
        $this->assertEquals(0.6667, $result['Branco']->accumulateRelativeFrequency);
        $this->assertEquals(0.7667, $result['Rosa']->accumulateRelativeFrequency);
        $this->assertEquals(1.000, $result['Amarelo']->accumulateRelativeFrequency);

        // Test accumulate percent relative frequency
        $this->assertEquals(23.33, $result['Azul claro']->accumulatePercentRelativeFrequency);
        $this->assertEquals(40.00, $result['Bege']->accumulatePercentRelativeFrequency);
        $this->assertEquals(66.67, $result['Branco']->accumulatePercentRelativeFrequency);
        $this->assertEquals(76.67, $result['Rosa']->accumulatePercentRelativeFrequency);
        $this->assertEquals(100.00, $result['Amarelo']->accumulatePercentRelativeFrequency);
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
        $this->assertEquals('C', $result['C']->variable);
        $this->assertEquals('B', $result['B']->variable);
        $this->assertEquals('R', $result['R']->variable);
        $this->assertEquals('N', $result['N']->variable);
        $this->assertEquals('I', $result['I']->variable);

        // Test frequencies
        $this->assertEquals(7, $result['C']->frequency);
        $this->assertEquals(9, $result['B']->frequency);
        $this->assertEquals(20, $result['R']->frequency);
        $this->assertEquals(15, $result['N']->frequency);
        $this->assertEquals(3, $result['I']->frequency);

        // Test relative frequencies
        $this->assertEquals(0.12963, $result['C']->relativeFrequency);
        $this->assertEquals(0.16667, $result['B']->relativeFrequency);
        $this->assertEquals(0.37037, $result['R']->relativeFrequency);
        $this->assertEquals(0.27778, $result['N']->relativeFrequency);
        $this->assertEquals(0.05556, $result['I']->relativeFrequency);

        // Test percent relative frequency
        $this->assertEquals(12.963, $result['C']->percentRelativeFrequency);
        $this->assertEquals(16.667, $result['B']->percentRelativeFrequency);
        $this->assertEquals(37.037, $result['R']->percentRelativeFrequency);
        $this->assertEquals(27.778, $result['N']->percentRelativeFrequency);
        $this->assertEquals(5.556, $result['I']->percentRelativeFrequency);

        // Test accumulate frequencies
        $this->assertEquals(7, $result['C']->accumulateFrequency);
        $this->assertEquals(16, $result['B']->accumulateFrequency);
        $this->assertEquals(36, $result['R']->accumulateFrequency);
        $this->assertEquals(51, $result['N']->accumulateFrequency);
        $this->assertEquals(54, $result['I']->accumulateFrequency);

        // test acummulate relative frequencies
        $this->assertEquals(0.12963, $result['C']->accumulateRelativeFrequency);
        $this->assertEquals(0.29630, $result['B']->accumulateRelativeFrequency);
        $this->assertEquals(0.66667, $result['R']->accumulateRelativeFrequency);
        $this->assertEquals(0.94445, $result['N']->accumulateRelativeFrequency);
        $this->assertEquals(1.00001, $result['I']->accumulateRelativeFrequency);

        // Test accumulate percent relative frequency
        $this->assertEquals(12.963, $result['C']->accumulatePercentRelativeFrequency);
        $this->assertEquals(29.630, $result['B']->accumulatePercentRelativeFrequency);
        $this->assertEquals(66.667, $result['R']->accumulatePercentRelativeFrequency);
        $this->assertEquals(94.445, $result['N']->accumulatePercentRelativeFrequency);
        $this->assertEquals(100.001, $result['I']->accumulatePercentRelativeFrequency);
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
        $this->assertEquals('Jan.', $result['Jan.']->variable);
        $this->assertEquals('Fev.', $result['Fev.']->variable);
        $this->assertEquals('Mar.', $result['Mar.']->variable);
        $this->assertEquals('Abr.', $result['Abr.']->variable);
        $this->assertEquals('Maio', $result['Maio']->variable);
        $this->assertEquals('Jun.', $result['Jun.']->variable);
        $this->assertEquals('Jul.', $result['Jul.']->variable);
        $this->assertEquals('Ago.', $result['Ago.']->variable);

        // Test frequencies
        $this->assertEquals(163, $result['Jan.']->frequency);
        $this->assertEquals(115, $result['Fev.']->frequency);
        $this->assertEquals(136, $result['Mar.']->frequency);
        $this->assertEquals(129, $result['Abr.']->frequency);
        $this->assertEquals(98, $result['Maio']->frequency);
        $this->assertEquals(147, $result['Jun.']->frequency);
        $this->assertEquals(130, $result['Jul.']->frequency);
        $this->assertEquals(104, $result['Ago.']->frequency);

        // Test relative frequencies
        $this->assertEquals(0.15949, $result['Jan.']->relativeFrequency);
        $this->assertEquals(0.11252, $result['Fev.']->relativeFrequency);
        $this->assertEquals(0.13307, $result['Mar.']->relativeFrequency);
        $this->assertEquals(0.12622, $result['Abr.']->relativeFrequency);
        $this->assertEquals(0.09589, $result['Maio']->relativeFrequency);
        $this->assertEquals(0.14384, $result['Jun.']->relativeFrequency);
        $this->assertEquals(0.12720, $result['Jul.']->relativeFrequency);
        $this->assertEquals(0.10176, $result['Ago.']->relativeFrequency);

        // Test percent relative frequency
        $this->assertEquals(15.949, $result['Jan.']->percentRelativeFrequency);
        $this->assertEquals(11.252, $result['Fev.']->percentRelativeFrequency);
        $this->assertEquals(13.307, $result['Mar.']->percentRelativeFrequency);
        $this->assertEquals(12.622, $result['Abr.']->percentRelativeFrequency);
        $this->assertEquals(9.589, $result['Maio']->percentRelativeFrequency);
        $this->assertEquals(14.384, $result['Jun.']->percentRelativeFrequency);
        $this->assertEquals(12.720, $result['Jul.']->percentRelativeFrequency);
        $this->assertEquals(10.176, $result['Ago.']->percentRelativeFrequency);

        // Test accumulate frequencies
        $this->assertEquals(163, $result['Jan.']->accumulateFrequency);
        $this->assertEquals(278, $result['Fev.']->accumulateFrequency);
        $this->assertEquals(414, $result['Mar.']->accumulateFrequency);
        $this->assertEquals(543, $result['Abr.']->accumulateFrequency);
        $this->assertEquals(641, $result['Maio']->accumulateFrequency);
        $this->assertEquals(788, $result['Jun.']->accumulateFrequency);
        $this->assertEquals(918, $result['Jul.']->accumulateFrequency);
        $this->assertEquals(1022, $result['Ago.']->accumulateFrequency);

        // test acummulate relative frequencies
        $this->assertEquals(0.15949, $result['Jan.']->accumulateRelativeFrequency);
        $this->assertEquals(0.27201, $result['Fev.']->accumulateRelativeFrequency);
        $this->assertEquals(0.40508, $result['Mar.']->accumulateRelativeFrequency);
        $this->assertEquals(0.53130, $result['Abr.']->accumulateRelativeFrequency);
        $this->assertEquals(0.62719, $result['Maio']->accumulateRelativeFrequency);
        $this->assertEquals(0.77103, $result['Jun.']->accumulateRelativeFrequency);
        $this->assertEquals(0.89823, $result['Jul.']->accumulateRelativeFrequency);
        $this->assertEquals(0.99999, $result['Ago.']->accumulateRelativeFrequency);

        // Test accumulate percent relative frequency
        $this->assertEquals(15.949, $result['Jan.']->accumulatePercentRelativeFrequency);
        $this->assertEquals(27.201, $result['Fev.']->accumulatePercentRelativeFrequency);
        $this->assertEquals(40.508, $result['Mar.']->accumulatePercentRelativeFrequency);
        $this->assertEquals(53.130, $result['Abr.']->accumulatePercentRelativeFrequency);
        $this->assertEquals(62.719, $result['Maio']->accumulatePercentRelativeFrequency);
        $this->assertEquals(77.103, $result['Jun.']->accumulatePercentRelativeFrequency);
        $this->assertEquals(89.823, $result['Jul.']->accumulatePercentRelativeFrequency);
        $this->assertEquals(99.999, $result['Ago.']->accumulatePercentRelativeFrequency);
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
        $this->assertEquals('142 |-- 145', $result[1]->descriptionClassInteval);
        $this->assertEquals('145 |-- 148', $result[2]->descriptionClassInteval);
        $this->assertEquals('148 |-- 151', $result[3]->descriptionClassInteval);
        $this->assertEquals('151 |-- 154', $result[4]->descriptionClassInteval);
        $this->assertEquals('154 |-- 157', $result[5]->descriptionClassInteval);
        $this->assertEquals('157 |-- 160', $result[6]->descriptionClassInteval);
        $this->assertEquals('160 |-- 163', $result[7]->descriptionClassInteval);

        // Test frequencies
        $this->assertEquals(3, $result[1]->frequency);
        $this->assertEquals(3, $result[2]->frequency);
        $this->assertEquals(7, $result[3]->frequency);
        $this->assertEquals(8, $result[4]->frequency);
        $this->assertEquals(14, $result[5]->frequency);
        $this->assertEquals(9, $result[6]->frequency);
        $this->assertEquals(6, $result[7]->frequency);

        // Test midPoint
        $this->assertEquals(143.5, $result[1]->midPoint);
        $this->assertEquals(146.5, $result[2]->midPoint);
        $this->assertEquals(149.5, $result[3]->midPoint);
        $this->assertEquals(152.5, $result[4]->midPoint);
        $this->assertEquals(155.5, $result[5]->midPoint);
        $this->assertEquals(158.5, $result[6]->midPoint);
        $this->assertEquals(161.5, $result[7]->midPoint);

        // Test relative frequencies
        $this->assertEquals(0.06, $result[1]->relativeFrequency);
        $this->assertEquals(0.06, $result[2]->relativeFrequency);
        $this->assertEquals(0.14, $result[3]->relativeFrequency);
        $this->assertEquals(0.16, $result[4]->relativeFrequency);
        $this->assertEquals(0.28, $result[5]->relativeFrequency);
        $this->assertEquals(0.18, $result[6]->relativeFrequency);
        $this->assertEquals(0.12, $result[7]->relativeFrequency);

        // Test percent relative frequency
        $this->assertEquals(6, $result[1]->percentRelativeFrequency);
        $this->assertEquals(6, $result[2]->percentRelativeFrequency);
        $this->assertEquals(14, $result[3]->percentRelativeFrequency);
        $this->assertEquals(16, $result[4]->percentRelativeFrequency);
        $this->assertEquals(28, $result[5]->percentRelativeFrequency);
        $this->assertEquals(18, $result[6]->percentRelativeFrequency);
        $this->assertEquals(12, $result[7]->percentRelativeFrequency);

        // Test accumulate frequencies
        $this->assertEquals(3, $result[1]->accumulateFrequency);
        $this->assertEquals(6, $result[2]->accumulateFrequency);
        $this->assertEquals(13, $result[3]->accumulateFrequency);
        $this->assertEquals(21, $result[4]->accumulateFrequency);
        $this->assertEquals(35, $result[5]->accumulateFrequency);
        $this->assertEquals(44, $result[6]->accumulateFrequency);
        $this->assertEquals(50, $result[7]->accumulateFrequency);

        // test acummulate relative frequencies
        $this->assertEquals(0.06, $result[1]->accumulateRelativeFrequency);
        $this->assertEquals(0.12, $result[2]->accumulateRelativeFrequency);
        $this->assertEquals(0.26, $result[3]->accumulateRelativeFrequency);
        $this->assertEquals(0.42, $result[4]->accumulateRelativeFrequency);
        $this->assertEquals(0.70, $result[5]->accumulateRelativeFrequency);
        $this->assertEquals(0.88, $result[6]->accumulateRelativeFrequency);
        $this->assertEquals(1.00, $result[7]->accumulateRelativeFrequency);

        // Test accumulate percent relative frequency
        $this->assertEquals(6, $result[1]->accumulatePercentRelativeFrequency);
        $this->assertEquals(12, $result[2]->accumulatePercentRelativeFrequency);
        $this->assertEquals(26, $result[3]->accumulatePercentRelativeFrequency);
        $this->assertEquals(42, $result[4]->accumulatePercentRelativeFrequency);
        $this->assertEquals(70, $result[5]->accumulatePercentRelativeFrequency);
        $this->assertEquals(88, $result[6]->accumulatePercentRelativeFrequency);
        $this->assertEquals(100, $result[7]->accumulatePercentRelativeFrequency);
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
        $this->assertEquals('230 |-- 250', $result[1]->descriptionClassInteval);
        $this->assertEquals('250 |-- 270', $result[2]->descriptionClassInteval);
        $this->assertEquals('270 |-- 290', $result[3]->descriptionClassInteval);
        $this->assertEquals('290 |-- 310', $result[4]->descriptionClassInteval);
        $this->assertEquals('310 |-- 330', $result[5]->descriptionClassInteval);
        $this->assertEquals('330 |-- 350', $result[6]->descriptionClassInteval);
        $this->assertEquals('350 |-- 370', $result[7]->descriptionClassInteval);

        // Test frequencies
        $this->assertEquals(6, $result[1]->frequency);
        $this->assertEquals(5, $result[2]->frequency);
        $this->assertEquals(8, $result[3]->frequency);
        $this->assertEquals(14, $result[4]->frequency);
        $this->assertEquals(12, $result[5]->frequency);
        $this->assertEquals(11, $result[6]->frequency);
        $this->assertEquals(4, $result[7]->frequency);

        // Test relative frequencies
        $this->assertEquals(0.1000, $result[1]->relativeFrequency);
        $this->assertEquals(0.0833, $result[2]->relativeFrequency);
        $this->assertEquals(0.1333, $result[3]->relativeFrequency);
        $this->assertEquals(0.2333, $result[4]->relativeFrequency);
        $this->assertEquals(0.2000, $result[5]->relativeFrequency);
        $this->assertEquals(0.1833, $result[6]->relativeFrequency);
        $this->assertEquals(0.0667, $result[7]->relativeFrequency);

        // Test accumulate frequencies
        $this->assertEquals(6, $result[1]->accumulateFrequency);
        $this->assertEquals(11, $result[2]->accumulateFrequency);
        $this->assertEquals(19, $result[3]->accumulateFrequency);
        $this->assertEquals(33, $result[4]->accumulateFrequency);
        $this->assertEquals(45, $result[5]->accumulateFrequency);
        $this->assertEquals(56, $result[6]->accumulateFrequency);
        $this->assertEquals(60, $result[7]->accumulateFrequency);

        // test acummulate relative frequencies
        $this->assertEquals(0.1000, $result[1]->accumulateRelativeFrequency);
        $this->assertEquals(0.1833, $result[2]->accumulateRelativeFrequency);
        $this->assertEquals(0.3166, $result[3]->accumulateRelativeFrequency);
        $this->assertEquals(0.5499, $result[4]->accumulateRelativeFrequency);
        $this->assertEquals(0.7499, $result[5]->accumulateRelativeFrequency);
        $this->assertEquals(0.9332, $result[6]->accumulateRelativeFrequency);
        $this->assertEquals(0.9999, $result[7]->accumulateRelativeFrequency);
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
        $this->assertEquals('180 |-- 220', $result[1]->descriptionClassInteval);
        $this->assertEquals('220 |-- 260', $result[2]->descriptionClassInteval);
        $this->assertEquals('260 |-- 300', $result[3]->descriptionClassInteval);
        $this->assertEquals('300 |-- 340', $result[4]->descriptionClassInteval);
        $this->assertEquals('340 |-- 380', $result[5]->descriptionClassInteval);
        $this->assertEquals('380 |-- 420', $result[6]->descriptionClassInteval);

        // Test frequencies
        $this->assertEquals(3, $result[1]->frequency);
        $this->assertEquals(2, $result[2]->frequency);
        $this->assertEquals(4, $result[3]->frequency);
        $this->assertEquals(14, $result[4]->frequency);
        $this->assertEquals(10, $result[5]->frequency);
        $this->assertEquals(7, $result[6]->frequency);

        // Test midPoint
        $this->assertEquals(200, $result[1]->midPoint);
        $this->assertEquals(240, $result[2]->midPoint);
        $this->assertEquals(280, $result[3]->midPoint);
        $this->assertEquals(320, $result[4]->midPoint);
        $this->assertEquals(360, $result[5]->midPoint);
        $this->assertEquals(400, $result[6]->midPoint);

        // Test relative frequencies
        $this->assertEquals(0.075, $result[1]->relativeFrequency);
        $this->assertEquals(0.050, $result[2]->relativeFrequency);
        $this->assertEquals(0.100, $result[3]->relativeFrequency);
        $this->assertEquals(0.350, $result[4]->relativeFrequency);
        $this->assertEquals(0.250, $result[5]->relativeFrequency);
        $this->assertEquals(0.175, $result[6]->relativeFrequency);

        // Test percent relative frequency
        $this->assertEquals(7.5, $result[1]->percentRelativeFrequency);
        $this->assertEquals(5.0, $result[2]->percentRelativeFrequency);
        $this->assertEquals(10.0, $result[3]->percentRelativeFrequency);
        $this->assertEquals(35.0, $result[4]->percentRelativeFrequency);
        $this->assertEquals(25.0, $result[5]->percentRelativeFrequency);
        $this->assertEquals(17.5, $result[6]->percentRelativeFrequency);

        // Test accumulate frequencies
        $this->assertEquals(3, $result[1]->accumulateFrequency);
        $this->assertEquals(5, $result[2]->accumulateFrequency);
        $this->assertEquals(9, $result[3]->accumulateFrequency);
        $this->assertEquals(23, $result[4]->accumulateFrequency);
        $this->assertEquals(33, $result[5]->accumulateFrequency);
        $this->assertEquals(40, $result[6]->accumulateFrequency);

        // test acummulate relative frequencies
        $this->assertEquals(0.075, $result[1]->accumulateRelativeFrequency);
        $this->assertEquals(0.125, $result[2]->accumulateRelativeFrequency);
        $this->assertEquals(0.225, $result[3]->accumulateRelativeFrequency);
        $this->assertEquals(0.575, $result[4]->accumulateRelativeFrequency);
        $this->assertEquals(0.825, $result[5]->accumulateRelativeFrequency);
        $this->assertEquals(1.000, $result[6]->accumulateRelativeFrequency);

        // Test accumulate percent relative frequency
        $this->assertEquals(7.5, $result[1]->accumulatePercentRelativeFrequency);
        $this->assertEquals(12.5, $result[2]->accumulatePercentRelativeFrequency);
        $this->assertEquals(22.5, $result[3]->accumulatePercentRelativeFrequency);
        $this->assertEquals(57.5, $result[4]->accumulatePercentRelativeFrequency);
        $this->assertEquals(82.5, $result[5]->accumulatePercentRelativeFrequency);
        $this->assertEquals(100.0, $result[6]->accumulatePercentRelativeFrequency);
    }
}