<?php

namespace App\Models;

class Employee
{
    protected $dataEmployees = [
        '1' => [
            'name' => 'Ahmad Antoni',
            'ptkp' => 'tk0',
            'salary' => 25000000
        ],
        '2' => [
            'name' => 'Sigit Zen',
            'ptkp' => 'k1',
            'salary' => 6500000
        ],
    ];

    protected $rateTaxs = [
        '1' => [
            'minPkp' => 0,
            'maxPkp' => 50000000,
            'taxPercentage' => 0.05,
        ],
        '2' => [
            'minPkp' => 50000000,
            'maxPkp' => 250000000,
            'taxPercentage' => 0.15,
        ],
        '3' => [
            'minPkp' => 250000000,
            'maxPkp' => 500000000,
            'taxPercentage' => 0.25,
        ],
        '4' => [
            'minPkp' => 500000000,
            'maxPkp' => 10000000000000,
            'taxPercentage' => 0.3,
        ],
    ];

    public function getEmployee($id)
    {
        return $this->dataEmployees[$id];
    }

    public function calculate($pkp, $rateTaxs)
    {
        $previous = 0;
        $previousMax = 0;
        $_pkp = $pkp;
        foreach($rateTaxs as $rateTax){
            if ($previous > 0 && $previousMax > 0) {
                $pkp = $_pkp - $previousMax;
            }

            if ($pkp >= $rateTax['maxPkp']) {
                $pkp = $rateTax['maxPkp'];
                $previousMax = $rateTax['maxPkp'];
            }

            $previous += ($pkp * $rateTax['taxPercentage']);
        }

        return $previous;
    }

    public function getRateTax($pkp)
    {
        $tempTax = [];
        foreach ($this->rateTaxs as $rateTax) {
            $tempTax[] = $rateTax;
            if ($pkp < $rateTax['maxPkp'] && $pkp >= $rateTax['minPkp']) {
                return $tempTax;
            }
        }

    }
}
