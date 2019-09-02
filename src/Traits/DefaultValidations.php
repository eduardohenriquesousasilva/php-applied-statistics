<?php

namespace drdhnrq\PhpAppliedStatistics\Traits;

use drdhnrq\PhpAppliedStatistics\Exceptions\VariableNotExistsInData;

trait DefaultValidations
{
    /**
     * This method will validate if the variable exist in the data
     *
     * @param array $data
     * @param array $orderedVariables
     *
     * @return array
     */
    public function validManualDefinedVariables(array $data, array $orderedVariables): array
    {
        foreach ($orderedVariables as $variable) {
            if (!in_array($variable, $data)) {
                throw new VariableNotExistsInData();
            }
        }

        return $data;
    }
}