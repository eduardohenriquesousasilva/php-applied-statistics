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







    public function generateData($data)
    {
        $b = [];
        foreach ($data as $key => $value) {
            for ($i = 1; $i <= $value; $i++) {
               array_push($b, $key);
            }
        }

        for ($i = 1; $i < 100000; $i++) {
                $newIndex =  rand(0, count($b) - 1);
                $currentIndex =  rand(0, count($b) - 1);
                $aux = $b[$currentIndex];

                $b[$currentIndex] = $b[$newIndex];
                $b[$newIndex] = $aux;
        }

        dump($b);
    }
}