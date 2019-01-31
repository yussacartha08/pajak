<?php

use Illuminate\Database\Seeder;

class EmployeesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Ahmad Fatoni',
                'ptkp' => 'tk0',
                'salary' => 25000000,
            ],
            [
                'name' => 'Zen Hamzah',
                'ptkp' => 'k1',
                'salary' => 6500000
            ],
        ];

        DB::table("employees")->insert($data);
    }
}
