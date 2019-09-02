<?php

use PHPUnit\Framework\TestCase;
use drdhnrq\PhpAppliedStatistics\Traits\DefaultValidations;
use drdhnrq\PhpAppliedStatistics\Exceptions\VariableNotExistsInData;

class DefaultValidationsTest extends TestCase
{
    /**
     * This test verifies if the methods exists in the trait
     *
     * @return void
     */
    public function testMethodsExists()
    {
        $mockTrait = $this->getMockForTrait(DefaultValidations::class);

        // validManualDefinedVariables()
        $this->assertTrue(
            method_exists($mockTrait, 'validManualDefinedVariables'),
            'The Trait DefaultValidations not have method validManualDefinedVariables'
        );
    }

    /**
     * This test will verifies if the method validManualDefinedVariable
     * is right working when called
     *
     * @return void
     */
    public function testValidManualDefinedVariablesMethod()
    {
        $mockTrait = $this->getMockForTrait(DefaultValidations::class);
        $data = ['house', 'Begin', 'enD', 'country'];

        // Success Validations
        $this->assertIsArray($mockTrait->validManualDefinedVariables($data, ['house']));
        $this->assertContains('house', $mockTrait->validManualDefinedVariables($data, ['house']));
        $this->assertContains('Begin', $mockTrait->validManualDefinedVariables($data, ['Begin']));
        $this->assertContains('enD', $mockTrait->validManualDefinedVariables($data, ['enD']));

        // Exceptions in Validation
        $this->expectException(VariableNotExistsInData::class);
        $mockTrait->validManualDefinedVariables($data, ['end']);
        $mockTrait->validManualDefinedVariables($data, ['House']);
    }
}