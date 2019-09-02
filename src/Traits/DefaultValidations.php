<?php

namespace drdhnrq\PhpAppliedStatistics\Traits;

use drdhnrq\PhpAppliedStatistics\Exceptions\VariableNotExistsInData;

trait DefaultValidations
{
    /**
     * This method will validate if the variable exist in the data
     *
     * @param array $orderedVariables
     * @return void
     */
    public function validManualDefinedVariables(array $orderedVariables): void
    {
        foreach ($orderedVariables as $variable) {
            if (!in_array($variable, $this->data)) {
                throw new VariableNotExistsInData();
            }
        }
    }
}