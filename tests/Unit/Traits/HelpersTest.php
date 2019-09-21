<?php

use PHPUnit\Framework\TestCase;
use drdhnrq\PhpAppliedStatistics\Traits\Helpers;

class HelpersTest extends TestCase
{
    /**
     * This test verifies if the methods exists in the trait
     *
     * @return void
     */
    public function testMethodsExists()
    {
        $mockTrait = $this->getMockForTrait(Helpers::class);

        // round()
        $this->assertTrue(
            method_exists($mockTrait, 'round'),
            'The Trait Helpers not have method round'
        );

        // formatStringData()
        $this->assertTrue(
            method_exists($mockTrait, 'formatStringData'),
            'The Trait Helpers not have method formatStringData'
        );
    }

    /**
     * This test will check if the round method is rounding the correct way
     * when it called
     *
     * @return void
     */
    public function testRoundMethod()
    {
        $mockTrait = $this->getMockForTrait(Helpers::class);

        // Without decimal places
        $this->assertEquals(1.4515, $mockTrait->round(1.4515));
        $this->assertEquals(1.45155, $mockTrait->round(1.45155));
        $this->assertEquals(1.45151, $mockTrait->round(1.45151));

        // With decimal places
        $this->assertEquals(300, $mockTrait->round(300.32, 0));
        $this->assertEquals(404, $mockTrait->round(403.6440, 0));
        $this->assertEquals(35.3, $mockTrait->round(35.32216, 1));
        $this->assertEquals(456.5, $mockTrait->round(456.541, 1));
        $this->assertEquals(2303.9, $mockTrait->round(2303.8714, 1));
        $this->assertEquals(23.46, $mockTrait->round(23.4585, 2));
        $this->assertEquals(171.29, $mockTrait->round(171.29401, 2));
        $this->assertEquals(15.216, $mockTrait->round(15.21622, 3));
        $this->assertEquals(603.823, $mockTrait->round(603.822714, 3));
    }

    /**
     * This test will verifies if the data are formmated when the method
     * formatStringData is called
     *
     * @return void
     */
    public function testFormatStringDataMethod()
    {
        $mockTrait = $this->getMockForTrait(Helpers::class);

        $data = ['test', 'name'];
        $this->assertEquals('Test', $mockTrait->formatStringData($data)[0]);
        $this->assertEquals('Name', $mockTrait->formatStringData($data)[1]);

        $data = ['tESt', 'naME'];
        $this->assertEquals('Test', $mockTrait->formatStringData($data)[0]);
        $this->assertEquals('Name', $mockTrait->formatStringData($data)[1]);
    }
}