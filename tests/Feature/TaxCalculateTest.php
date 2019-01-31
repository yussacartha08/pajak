<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TaxCalculateTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testTaxCalculate()
    {
        $employeeIds = ['employees' => [1, 2]];
        $this->post(route('tax.process', $employeeIds))
        ->assertOk()
        ->assertJsonStructure(
            [
                'success',
                'result' => [
                    '*' => [
                        'taxableIncome',
                        'taxIncome'
                    ]
                ]
            ]
        )
        ->assertStatus(200);
    }
}
