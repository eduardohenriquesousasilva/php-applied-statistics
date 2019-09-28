<?php

class DataProvider
{
    public static function civilStatusPeople(): array
    {
        return [
            'data' => [
                'separado', 'separado', 'viúvo', 'solteiro', 'casado', 'casado', 'casado',
                'solteiro', 'viúvo', 'casado', 'solteiro', 'solteiro', 'solteiro', 'separado',
                'casado', 'separado', 'solteiro', 'casado', 'casado', 'separado', 'separado',
                'casado', 'solteiro', 'casado', 'casado', 'separado', 'separado', 'separado',
                'separado', 'viúvo', 'separado', 'casado', 'solteiro', 'casado', 'separado',
                'casado', 'separado', 'casado', 'casado', 'solteiro', 'casado', 'solteiro',
                'separado', 'solteiro', 'solteiro', 'casado', 'separado', 'separado', 'casado',
                'solteiro', 'casado', 'separado', 'casado', 'casado', 'viúvo', 'casado',
            ]
        ];
    }

    /**
     * This data represents the number of defective parts that a
     * company has in each box that was made by her.
     * These data will be used to do a continuous frequency Distribution.
     *
     * @return array
     */
    public static function defectiveParts(): array
    {
        return [
            'data' => [
                2, 1, 1, 0, 2, 0, 0, 0, 1, 0,
                1, 0, 0, 2, 1, 1, 0, 0, 1, 1,
                0, 1, 2, 0, 0, 1, 2, 1, 0, 0,
            ]
        ];
    }

    /**
     * This data represents the salary value of the employees, this data
     * will used to calculate the frequency distribution with the salary
     * theses employees
     *
     * @return array
     */
    public function employeesSalary(): array
    {
        return [
            'data' => [
                1800.00, 960.00, 1220.00, 950.00, 1410.00, 1600.00, 1450.00,
                1510.00, 1060.00, 980.00, 1330.00, 1190.00, 1130.00, 1800.00,
                1390.00, 1740.00, 1660.00, 1400.00, 1760.00, 1840.00, 1270.00,
                990.00, 1380.00, 1550.00, 1020.00, 1730.00, 1210.00, 1100.00,
                1000.00, 1580.00, 980.00, 1650.00, 1500.00, 950.00, 1800.00,
                1620.00, 1280.00, 1300.00, 1220.00, 1440.00, 1510.00, 1660.00,
                1200.00, 1330.00, 1700.00, 980.00, 1050.00, 1340.00, 1850.00,
                1000.00,
            ]
        ];
    }



    // Calcs of average
    public function numberOfComputerByhouse(): array
    {
        return [
            (object) [
                'variable' => 0,
                'frequency' => 4
            ],
            (object) [
                'variable' => 1,
                'frequency' => 19
            ],
            (object) [
                'variable' => 2,
                'frequency' => 16
            ],
            (object) [
                'variable' => 3,
                'frequency' => 9
            ],
            (object) [
                'variable' => 4,
                'frequency' => 2
            ],
        ];
    }

    public function numberOfLateMonthPayments(): array
    {
        return [
            (object) [
                'variable' => 1,
                'frequency' => 12
            ],
            (object) [
                'variable' => 2,
                'frequency' => 16
            ],
            (object) [
                'variable' => 3,
                'frequency' => 21
            ],
            (object) [
                'variable' => 4,
                'frequency' => 15
            ],
            (object) [
                'variable' => 5,
                'frequency' => 13
            ],
            (object) [
                'variable' => 6,
                'frequency' => 10
            ],
        ];
    }

    public function passengersStatureDistribution(): array
    {
        return [
            (object) [
                'midPoint' => 153.5,
                'frequency' => 7,
            ],
            (object) [
                'midPoint' => 160.5,
                'frequency' => 19,
            ],
            (object) [
                'midPoint' => 167.5,
                'frequency' => 25,
            ],
            (object) [
                'midPoint' => 174.5,
                'frequency' => 26,
            ],
            (object) [
                'midPoint' => 181.5,
                'frequency' => 21,
            ],
            (object) [
                'midPoint' => 188.5,
                'frequency' => 8,
            ],
            (object) [
                'midPoint' => 195.5,
                'frequency' => 3,
            ],
        ];
    }


    // modal value
    public function salesDistributionByHomeAppliances(): array
    {
        return [
            (object) [
                'variable' => 'Fogão',
                'frequency' => 53,
            ],
            (object) [
                'variable' => 'Geladeira duplex',
                'frequency' => 82,
            ],
            (object) [
                'variable' => 'Máquina de lavar roupa',
                'frequency' => 33,
            ],
            (object) [
                'variable' => 'Tanquinho',
                'frequency' => 26,
            ],
            (object) [
                'variable' => 'Secadora',
                'frequency' => 31,
            ],
        ];
    }

    public function numberCarsRentedInHundredDays(): array
    {
        return [
            (object) [
                'variable' => 25,
                'frequency' => 5,
            ],
            (object) [
                'variable' => 30,
                'frequency' => 13,
            ],
            (object) [
                'variable' => 35,
                'frequency' => 28,
            ],
            (object) [
                'variable' => 40,
                'frequency' => 36,
            ],
            (object) [
                'variable' => 45,
                'frequency' => 18,
            ],
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
            $currentIndex =  rand(0, count($b) - 1);
            $newIndex =  rand(0, count($b) - 1);

            $aux = $b[$currentIndex];
            $b[$currentIndex] = $b[$newIndex];
            $b[$newIndex] = $aux;
        }

        return $b;
    }
}