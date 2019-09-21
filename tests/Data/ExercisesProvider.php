<?php

/**
 * This method contains the data that will be used to test the methods of the
 * class-based in the exercises proposed from the book "Estatísca Básica"
 */
class ExercisesProvider
{
    /**
     * This method returns the data with how costumers evaluate the attendance
     * in a supermarket, the data contains the evaluates and other keys with
     * the values that are received as a result of the calculated made.
     * It exercise 1, page 88 from the book
     *
     * @return array
     */
    public static function attendanceSupermarket(): array
    {
        return [
            'Ótimo', 'Ruim', 'Bom', 'Regular', 'Ruim', 'Bom', 'Bom', 'Bom', 'Ótimo',
            'Ruim', 'Ótimo', 'Regular', 'Bom', 'Ótimo', 'Ótimo', 'Regular', 'Bom', 'Bom',
            'Bom', 'Bom', 'Bom', 'Bom', 'Ruim', 'Ótimo', 'Bom', 'Bom', 'Regular', 'Bom',
            'Ótimo', 'Regular', 'Ótimo', 'Regular', 'Bom', 'Regular', 'Bom', 'Bom', 'Regular',
            'Bom', 'Bom', 'Regular', 'Bom', 'Ótimo', 'Ruim', 'Bom', 'Ótimo', 'Regular', 'Bom',
            'Bom', 'Bom', 'Ótimo', 'Bom', 'Bom', 'Bom', 'Bom', 'Bom', 'Ótimo', 'Ótimo',
            'Regular', 'Ruim', 'Regular',
        ];
    }

    /**
     * This method contains the data of the number of children that each family has,
     * the data contains the number of children and the values that should received
     * as answer of the calculated whit this data.
     * It exercise 2, page 88 from the book
     *
     * @return array
     */
    public static function numberChildrenByFamily(): array
    {
        return [
            2, 3, 1, 3, 2, 3, 2, 0, 3, 0,
            3, 1, 4, 1, 1, 4, 1, 1, 2, 2,
            1, 2, 0, 2, 2, 2, 3, 0, 2, 1,
        ];
    }

    /**
     * This method contains the data of research about the economy students that
     * were internships and how many these students obtained a good job.
     * The answers about the frequency distribution will be calculated using this data.
     * It exercise 3, page 89 from the book
     *
     * @return array
     */
    public function internshipsEconomyStudents(): array
    {
        return [
            4, 5, 4, 3, 4, 5, 4, 2, 4, 3, 3, 3, 3, 3, 4, 3, 3, 5, 3, 3,
            4, 5, 4, 4, 3, 4, 3, 4, 3, 4, 4, 3, 4, 4, 4, 4, 4, 2, 4, 2,
            1, 4, 5, 5, 4, 5, 4, 4, 4, 5, 4, 3, 1, 4, 4, 3, 1, 2, 2, 2,
            4, 3, 4, 4, 4, 3, 3, 4, 4, 4, 2, 4, 4, 5, 3, 4, 3, 4, 3, 1,
            4, 3, 4, 2, 4, 4, 3, 2, 5, 3, 1, 1, 3, 3, 3, 5, 2, 4, 4, 5,
            5, 3, 2, 5, 3, 3, 3, 1, 3, 1, 3, 4, 3, 3, 3, 4, 1, 1, 4, 4,
            4, 2, 3, 4, 2, 4, 3, 5, 1, 2, 2, 2, 3, 2, 2, 3, 4, 3, 5, 4,
            4, 1, 5, 4, 4, 1, 3, 4, 1, 4, 4, 4, 3, 4, 1, 5, 3, 3, 1, 4,
            3, 4, 4, 3, 3, 3, 3, 5, 5, 4, 1, 5, 4, 2, 3, 3, 2, 3, 4, 4,
            3, 4, 1, 5, 3, 3, 2, 3, 4, 3, 3, 2, 2, 1, 3, 4, 2, 2, 4, 2,
            4, 2, 5, 1, 3, 4, 4, 2, 4, 1, 4, 2, 2, 4, 1, 3, 3, 4, 3, 5,
            1, 4, 4, 4, 3, 4, 4, 2, 3, 4, 4, 3, 4, 4, 1, 1, 3, 4, 1, 4,
            2, 1, 3, 2, 4, 3, 4, 4, 4, 4, 4, 1, 4, 4, 3, 4, 2, 3, 2, 3,
            3, 4, 2, 4, 4, 2, 3, 1, 3, 3, 2, 3, 3, 4, 2, 5, 4, 2, 2, 4,
            3, 4, 3, 4, 1, 3, 3, 3, 4, 4, 3, 4, 4, 4, 3, 1, 1, 2, 4, 2,
        ];
    }

    /**
     * This test contains the number of attendance that did for 40 days,
     * this data will be used to calculate the frequency distribution and
     * determine the number of urgent attendance that happened in each day.
     * It exercise 4, page 90 from the book
     *
     * @return array
     */
    public function urgentAttendanceInHospital(): array
    {
        return [
            2, 2, 1, 2, 2, 1, 1, 2, 1, 1,
            1, 3, 2, 2, 3, 2, 3, 1, 1, 3,
            2, 3, 2, 2, 1, 5, 1, 3, 2, 3,
            5, 2, 3, 1, 1, 1, 1, 2, 2, 2,
        ];
    }

    /**
     * This method contains the data of the research about what color is calmer
     * and quieter, this data will be used to calculate the frequency distribution
     * It exercise 5, page 91 from the book
     *
     * @return array
     */
    public function opinionAboutWhatColorIsCalmerAndQuieter(): array
    {
        return [
            'azul claro', 'amarelo', 'azul claro', 'azul claro', 'azul claro', 'amarelo',
            'amarelo', 'amarelo', 'bege', 'azul claro', 'bege', 'bege', 'branco', 'azul claro',
            'branco', 'branco', 'branco', 'amarelo', 'branco', 'amarelo', 'bege', 'rosa',
            'bege', 'branco', 'branco', 'azul claro', 'amarelo', 'rosa', 'rosa', 'branco',
        ];
    }

    /**
     * This method contains the data of intention of the companies to be certified
     * in the iso 9001, this data will used to calculate the qualitative frequency
     * distribution and verify if the answers are right.
     * It exercise 6, page 91 from the book
     *
     * @return array
     */
    public function companiesThatIntentionToCertifyIso9001(): array
    {
        // C = certfieds
        // B = trying to be certfied
        // C = will try to certify
        // N = won't try to certify
        // I = Don't know

        return [
            'R', 'B', 'C', 'N', 'I', 'R', 'N', 'N', 'R', 'C', 'N',
            'R', 'B', 'R', 'R', 'R', 'B', 'R', 'N', 'R', 'B', 'R',
            'C', 'B', 'I', 'C', 'N', 'R', 'N', 'R', 'N', 'B', 'N',
            'R', 'N', 'N', 'N', 'C', 'B', 'B', 'R', 'C', 'I', 'N',
            'N', 'B', 'C', 'N', 'R', 'R', 'R', 'R', 'R', 'R',
        ];
    }

    /**
     * This data contains the amount tractors that solded in each month
     * and this data will use to calculate the frequency distribution that
     * tractors solded by month.
     * It exercise 7, page 92 from the book
     *
     * @return array
     */
    public function amountTractorsSoldByMonth(): array
    {
        return [
            'jun.', 'jun.', 'jun.', 'abr.', 'fev.', 'jun.', 'maio', 'abr.', 'maio', 'mar.',
            'abr.', 'maio', 'jan.', 'ago.', 'maio', 'ago.', 'maio', 'jul.', 'abr.', 'abr.',
            'maio', 'jun.', 'fev.', 'jan.', 'jun.', 'jun.', 'jan.', 'jan.', 'mar.', 'abr.',
            'jul.', 'abr.', 'jan.', 'ago.', 'mar.', 'fev.', 'mar.', 'maio', 'jun.', 'mar.',
            'maio', 'ago.', 'jul.', 'fev.', 'mar.', 'ago.', 'ago.', 'jun.', 'mar.', 'jan.',
            'jun.', 'jul.', 'jul.', 'fev.', 'fev.', 'jul.', 'abr.', 'mar.', 'fev.', 'mar.',
            'fev.', 'jul.', 'abr.', 'jun.', 'jan.', 'jul.', 'ago.', 'mar.', 'ago.', 'jan.',
            'abr.', 'abr.', 'maio', 'jul.', 'jul.', 'abr.', 'abr.', 'abr.', 'fev.', 'ago.',
            'ago.', 'jan.', 'fev.', 'jan.', 'maio', 'abr.', 'abr.', 'abr.', 'jan.', 'jun.',
            'jul.', 'jun.', 'fev.', 'ago.', 'jan.', 'jun.', 'jan.', 'jun.', 'maio', 'fev.',
            'jul.', 'jan.', 'fev.', 'jun.', 'jan.', 'abr.', 'abr.', 'jan.', 'jun.', 'abr.',
            'fev.', 'maio', 'jun.', 'ago.', 'mar.', 'jun.', 'abr.', 'jul.', 'jan.', 'jun.',
            'abr.', 'jan.', 'jan.', 'maio', 'maio', 'jul.', 'jun.', 'jun.', 'abr.', 'mar.',
            'mar.', 'mar.', 'abr.', 'jan.', 'jun.', 'jun.', 'jan.', 'jan.', 'jun.', 'jan.',
            'ago.', 'fev.', 'jun.', 'fev.', 'jul.', 'abr.', 'ago.', 'jun.', 'ago.', 'jul.',
            'jan.', 'jan.', 'ago.', 'fev.', 'jul.', 'jan.', 'abr.', 'jun.', 'mar.', 'jun.',
            'abr.', 'abr.', 'maio', 'abr.', 'abr.', 'ago.', 'jun.', 'maio', 'jul.', 'ago.',
            'jul.', 'ago.', 'ago.', 'maio', 'ago.', 'fev.', 'jan.', 'jan.', 'jan.', 'jun.',
            'jan.', 'jun.', 'ago.', 'mar.', 'maio', 'jun.', 'jan.', 'ago.', 'fev.', 'jun.',
            'jun.', 'jan.', 'maio', 'maio', 'jun.', 'mar.', 'jul.', 'mar.', 'ago.', 'mar.',
            'jun.', 'abr.', 'ago.', 'jan.', 'ago.', 'jan.', 'abr.', 'jul.', 'fev.', 'maio',
            'maio', 'mar.', 'ago.', 'jun.', 'mar.', 'jan.', 'mar.', 'mar.', 'jun.', 'abr.',
            'ago.', 'jun.', 'mar.', 'ago.', 'jul.', 'jul.', 'jul.', 'mar.', 'fev.', 'jul.',
            'maio', 'jan.', 'jun.', 'jun.', 'jul.', 'jan.', 'jul.', 'jan.', 'ago.', 'abr.',
            'fev.', 'abr.', 'mar.', 'maio', 'jul.', 'ago.', 'mar.', 'ago.', 'maio', 'jun.',
            'jun.', 'fev.', 'jan.', 'fev.', 'jun.', 'mar.', 'jul.', 'ago.', 'jun.', 'fev.',
            'maio', 'maio', 'maio', 'maio', 'maio', 'fev.', 'jun.', 'jun.', 'mar.', 'mar.',
            'fev.', 'jun.', 'jan.', 'abr.', 'jan.', 'jun.', 'jan.', 'ago.', 'maio', 'fev.',
            'fev.', 'abr.', 'mar.', 'jul.', 'maio', 'jul.', 'jan.', 'ago.', 'jan.', 'jun.',
            'abr.', 'jul.', 'ago.', 'abr.', 'jun.', 'jul.', 'mar.', 'jul.', 'abr.', 'maio',
            'maio', 'mar.', 'maio', 'jan.', 'fev.', 'jan.', 'jun.', 'jan.', 'jun.', 'fev.',
            'maio', 'jul.', 'maio', 'jun.', 'jan.', 'mar.', 'abr.', 'mar.', 'maio', 'jul.',
            'jun.', 'jan.', 'abr.', 'ago.', 'jan.', 'abr.', 'jun.', 'maio', 'jun.', 'jun.',
            'mar.', 'abr.', 'jan.', 'maio', 'mar.', 'abr.', 'jan.', 'jan.', 'mar.', 'fev.',
            'ago.', 'mar.', 'mar.', 'jun.', 'ago.', 'jan.', 'jun.', 'jun.', 'jan.', 'fev.',
            'mar.', 'fev.', 'jun.', 'abr.', 'jun.', 'ago.', 'jul.', 'maio', 'jun.', 'abr.',
            'jul.', 'abr.', 'jun.', 'ago.', 'ago.', 'mar.', 'jun.', 'mar.', 'jan.', 'jul.',
            'abr.', 'maio', 'fev.', 'fev.', 'ago.', 'jun.', 'fev.', 'mar.', 'jul.', 'jan.',
            'jan.', 'jan.', 'abr.', 'jul.', 'abr.', 'jan.', 'fev.', 'fev.', 'jan.', 'jun.',
            'ago.', 'jul.', 'jun.', 'jun.', 'jan.', 'jun.', 'jun.', 'abr.', 'fev.', 'jul.',
            'fev.', 'jan.', 'mar.', 'mar.', 'ago.', 'mar.', 'jan.', 'fev.', 'abr.', 'maio',
            'mar.', 'abr.', 'jul.', 'maio', 'ago.', 'ago.', 'mar.', 'ago.', 'jan.', 'jan.',
            'ago.', 'fev.', 'jun.', 'mar.', 'jan.', 'jan.', 'fev.', 'jan.', 'jun.', 'jan.',
            'jan.', 'jan.', 'abr.', 'jan.', 'mar.', 'jun.', 'fev.', 'jun.', 'jul.', 'ago.',
            'fev.', 'ago.', 'jun.', 'fev.', 'maio', 'ago.', 'jul.', 'ago.', 'jul.', 'jul.',
            'ago.', 'abr.', 'maio', 'jul.', 'jul.', 'fev.', 'abr.', 'fev.', 'mar.', 'ago.',
            'fev.', 'maio', 'jul.', 'jan.', 'jan.', 'jul.', 'jan.', 'jan.', 'ago.', 'fev.',
            'jun.', 'fev.', 'ago.', 'jan.', 'fev.', 'mar.', 'jan.', 'jan.', 'jul.', 'mar.',
            'abr.', 'maio', 'maio', 'mar.', 'mar.', 'jun.', 'jul.', 'mar.', 'maio', 'jul.',
            'ago.', 'jan.', 'ago.', 'jun.', 'jun.', 'jan.', 'ago.', 'abr.', 'jun.', 'ago.',
            'jan.', 'abr.', 'fev.', 'jul.', 'fev.', 'maio', 'jan.', 'abr.', 'jul.', 'maio',
            'jan.', 'fev.', 'maio', 'jan.', 'maio', 'abr.', 'jul.', 'mar.', 'jan.', 'maio',
            'jun.', 'ago.', 'fev.', 'jul.', 'fev.', 'jul.', 'jan.', 'mar.', 'abr.', 'jan.',
            'mar.', 'abr.', 'abr.', 'fev.', 'abr.', 'ago.', 'jun.', 'fev.', 'jun.', 'ago.',
            'maio', 'jul.', 'jan.', 'mar.', 'jul.', 'fev.', 'maio', 'jun.', 'maio', 'jan.',
            'maio', 'jul.', 'fev.', 'jul.', 'jan.', 'jul.', 'abr.', 'mar.', 'jul.', 'mar.',
            'mar.', 'abr.', 'ago.', 'jan.', 'jan.', 'jun.', 'jan.', 'mar.', 'maio', 'maio',
            'jan.', 'maio', 'jun.', 'abr.', 'jan.', 'mar.', 'mar.', 'abr.', 'jun.', 'mar.',
            'abr.', 'fev.', 'jan.', 'abr.', 'ago.', 'mar.', 'abr.', 'maio', 'abr.', 'abr.',
            'jul.', 'mar.', 'jul.', 'maio', 'ago.', 'fev.', 'jan.', 'jun.', 'jul.', 'abr.',
            'jun.', 'abr.', 'jun.', 'jul.', 'ago.', 'jan.', 'ago.', 'mar.', 'fev.', 'jun.',
            'jan.', 'fev.', 'fev.', 'fev.', 'mar.', 'jul.', 'mar.', 'jun.', 'jul.', 'jul.',
            'jun.', 'mar.', 'jul.', 'maio', 'mar.', 'ago.', 'mar.', 'abr.', 'maio', 'fev.',
            'jan.', 'jan.', 'abr.', 'jul.', 'jan.', 'mar.', 'fev.', 'jan.', 'jun.', 'ago.',
            'maio', 'abr.', 'jun.', 'mar.', 'fev.', 'jun.', 'abr.', 'mar.', 'jun.', 'jul.',
            'jun.', 'abr.', 'jul.', 'jun.', 'jul.', 'mar.', 'mar.', 'mar.', 'maio', 'fev.',
            'maio', 'ago.', 'maio', 'maio', 'mar.', 'jan.', 'mar.', 'ago.', 'abr.', 'maio',
            'ago.', 'jul.', 'fev.', 'ago.', 'jan.', 'abr.', 'ago.', 'ago.', 'maio', 'mar.',
            'jan.', 'abr.', 'jul.', 'jun.', 'maio', 'fev.', 'abr.', 'jun.', 'fev.', 'fev.',
            'ago.', 'jun.', 'jul.', 'jan.', 'jul.', 'jun.', 'jun.', 'jan.', 'jul.', 'jan.',
            'jul.', 'jul.', 'jan.', 'fev.', 'mar.', 'jul.', 'fev.', 'abr.', 'jul.', 'mar.',
            'jan.', 'abr.', 'abr.', 'jan.', 'ago.', 'jun.', 'mar.', 'abr.', 'jul.', 'mar.',
            'mar.', 'mar.', 'mar.', 'abr.', 'maio', 'fev.', 'fev.', 'fev.', 'fev.', 'maio',
            'mar.', 'abr.', 'jun.', 'jan.', 'jul.', 'fev.', 'jul.', 'ago.', 'fev.', 'jan.',
            'jul.', 'jul.', 'jun.', 'jun.', 'jul.', 'fev.', 'jun.', 'maio', 'jan.', 'maio',
            'jul.', 'mar.', 'fev.', 'jan.', 'ago.', 'mar.', 'maio', 'jul.', 'jul.', 'jun.',
            'jan.', 'mar.', 'jan.', 'jun.', 'ago.', 'abr.', 'mar.', 'maio', 'ago.', 'fev.',
            'mar.', 'abr.', 'jul.', 'ago.', 'fev.', 'jan.', 'fev.', 'fev.', 'mar.', 'abr.',
            'fev.', 'maio', 'jan.', 'abr.', 'ago.', 'jun.', 'jan.', 'jul.', 'jan.', 'jan.',
            'jun.', 'jan.', 'mar.', 'jan.', 'abr.', 'jul.', 'abr.', 'jun.', 'fev.', 'maio',
            'jul.', 'ago.', 'jul.', 'jan.', 'jun.', 'abr.', 'abr.', 'jan.', 'mar.', 'maio',
            'abr.', 'jun.', 'jan.', 'fev.', 'jan.', 'abr.', 'jan.', 'jun.', 'jan.', 'jan.',
            'ago.', 'fev.', 'jan.', 'jan.', 'maio', 'jul.', 'mar.', 'fev.', 'maio', 'abr.',
            'fev.', 'mar.', 'jul.', 'maio', 'mar.', 'jan.', 'ago.', 'jun.', 'ago.', 'jun.',
            'jul.', 'jul.', 'mar.', 'jun.', 'abr.', 'abr.', 'mar.', 'jun.', 'fev.', 'jan.',
            'abr.', 'fev.', 'jul.', 'maio', 'abr.', 'jun.', 'mar.', 'abr.', 'jul.', 'mar.',
            'jun.', 'jul.', 'jan.', 'jun.', 'jun.', 'jan.', 'jan.', 'ago.', 'jul.', 'jun.',
            'abr.', 'mar.', 'jul.', 'mar.', 'abr.', 'mar.', 'jan.', 'fev.', 'fev.', 'ago.',
            'fev.', 'maio', 'maio', 'mar.', 'jan.', 'mar.', 'jun.', 'abr.', 'maio', 'mar.',
            'jan.', 'ago.', 'mar.', 'mar.', 'maio', 'mar.', 'jan.', 'jun.', 'mar.', 'jan.',
            'ago.', 'jun.', 'jun.', 'mar.', 'mar.', 'abr.', 'maio', 'maio', 'maio', 'ago.',
            'abr.', 'jul.', 'jun.', 'jun.', 'jun.', 'ago.', 'jan.', 'fev.', 'fev.', 'jan.',
            'mar.', 'jul.', 'ago.', 'jan.', 'jul.', 'jul.', 'mar.', 'mar.', 'fev.', 'abr.',
            'jul.', 'jan.', 'mar.', 'jul.', 'jul.', 'maio', 'abr.', 'jul.', 'jul.', 'jul.',
            'abr.', 'jan.', 'mar.', 'mar.', 'jul.', 'jan.', 'ago.', 'jul.', 'fev.', 'jun.',
            'fev.', 'abr.', 'mar.', 'jul.', 'jan.', 'jan.', 'jul.', 'fev.', 'jul.', 'mar.',
            'jan.', 'jun.', 'jul.', 'ago.', 'ago.', 'mar.', 'abr.', 'jul.', 'abr.', 'abr.',
            'abr.', 'jul.', 'maio', 'jan.', 'abr.', 'fev.', 'abr.', 'fev.', 'ago.', 'abr.',
            'fev.', 'jun.', 'jan.', 'jan.', 'mar.', 'jun.', 'fev.', 'jun.', 'fev.', 'ago.',
            'abr.', 'maio', 'maio', 'abr.', 'jul.', 'ago.', 'mar.', 'jan.', 'jul.', 'jan.',
            'jun.', 'jan.', 'fev.', 'mar.', 'jun.', 'abr.', 'jun.', 'abr.', 'abr.', 'mar.',
            'jun.', 'fev.', 'jan.', 'jan.', 'mar.', 'ago.', 'jun.', 'mar.', 'mar.', 'jun.',
            'fev.', 'ago.',
        ];
    }

    /**
     * This method contains the stature of 50 teenager, this data will
     * use to calculate the frquency distribution
     * It exercise 9, page 93 from the book
     *
     * @return array
     */
    public function statureOfTeenager(): array
    {
        return [
            142, 156, 161, 149, 155, 157, 148, 153, 155, 161, 150, 156, 144, 152, 162,
            158, 147, 154, 160, 155, 156, 151, 145, 154, 159, 159, 154, 152, 157, 153,
            160, 149, 154, 156, 145, 157, 159, 152, 155, 149, 160, 148, 153, 156, 152,
            158, 150, 154, 143, 157,
        ];
    }

    /**
     * This method contains the amount of hubcap producted in the
     * facotory, this data will be used to calculate the frequency
     * distribution
     * It exercise 10, page 94 from the book
     *
     * @return array
     */
    public function hubcapProductionInFactory(): array
    {
        return [
            230, 232, 244, 245, 248, 249, 250, 255, 257, 260, 264, 271, 278, 280, 280,
            280, 281, 284, 289, 292, 292, 293, 294, 294, 296, 299, 299, 299, 302, 305,
            308, 309, 309, 310, 311, 312, 314, 315, 316, 318, 318, 320, 321, 324, 326,
            333, 335, 335, 337, 337, 339, 341, 342, 342, 342, 348, 356, 360, 365, 369,
        ];
    }

    /**
     * This method contains the total expenditure energy in a house
     * by month, this data will use to calculate the frequency distribution
     * It exercise 11, page 94 from the book
     *
     * @return array
     */
    public function expenditureEnergyByMonth(): array
    {
        return [
            409, 351, 325, 418, 314, 180, 396, 340, 356, 369,
            321, 308, 213, 318, 281, 386, 334, 327, 245, 297,
            327, 377, 344, 209, 302, 358, 286, 393, 398, 290,
            331, 348, 339, 355, 321, 415, 352, 235, 329, 333
        ];
    }
}