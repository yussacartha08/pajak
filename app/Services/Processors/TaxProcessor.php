<?php

namespace App\Services\Processors;

use App\Services\TaxGroup;
use App\Models\Employee;

class TaxProcessor
{
    public function __construct(Employee $employee)
    {
        $this->employee = $employee;
    }

    public function process($employee)
    {
        $untaxable = (float) TaxGroup::$PTKP[$employee['ptkp']];
        $taxableIncome = (12 * $employee['salary']) - $untaxable;

        $rateTaxs = $this->employee->getRateTax($taxableIncome);

        $taxIncome = $this->employee->calculate($taxableIncome, $rateTaxs);

        return [
            'taxableIncome' => $taxableIncome,
            'taxIncome' => $taxIncome,
        ];
    }
}