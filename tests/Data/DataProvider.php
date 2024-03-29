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
}