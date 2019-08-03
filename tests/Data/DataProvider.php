<?php

class DataProvider
{
    /**
     * This data represents the number of defective parts that a
     * company has in each box that was made by her.
     * These data will be used to do a continuous frequency Distribution.
     *
     * @return void
     */
    public static function defectiveParts(): array
    {
        return [
            'data' => [
                2, 1, 1, 0, 2, 0, 0, 0, 1, 0,
                1, 0, 0, 2, 1, 1, 0, 0, 1, 1,
                0, 1, 2, 0, 0, 1, 2, 1, 0, 0,
            ],
            'ordered' => [
                0, 0, 0, 0, 0, 0, 0, 0, 0, 0,
                0, 0, 0, 0, 1, 1, 1, 1, 1, 1,
                1, 1, 1, 1, 1, 2, 2, 2, 2, 2,
            ]
        ];
    }
}