<?php

namespace App\Services\Processes;

class TaxProcess
{
    public function process(Array $employee)
    {
        $taxProcessor = app('App\Services\Processors\TaxProcessor');

        $result = $taxProcessor->process($employee);

        return $result;
    }
}