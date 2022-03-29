<?php

use Illuminate\Database\Seeder;

class SalarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Salary::truncate();
        $salary = [
            [
               'rank' => 1,
                'coefficient' => 2.847,
            ],[
                'rank' => 2,
                'coefficient' => 2.997,
            ],[
                'rank' => 3,
                'coefficient' => 3.148,
            ],[
                'rank' => 4,
                'coefficient' => 3.297,
            ],[
                'rank' => 5,
                'coefficient' => 3.612,
            ],
            [
                'rank' => 6,
                'coefficient' => 3.941,
            ],[
                'rank' => 7,
                'coefficient' => 4.284,
            ],[
                'rank' => 8,
                'coefficient' => 4.64,
            ],
            [
                'rank' => 9,
                'coefficient' => 4.997,
            ],[
                'rank' => 10,
                'coefficient' => 5.362,
            ],[
                'rank' => 11,
                'coefficient' => 5.733,
            ],
            [
                'rank' => 12,
                'coefficient' => 6.115,
            ],[
                'rank' => 13,
                'coefficient' => 6.503,
            ],[
                'rank' => 14,
                'coefficient' =>  6.893,
            ],[
                'rank' => 15,
                'coefficient' =>  7.292,
            ],[
                'rank' => 16,
                'coefficient' => 7.697,
            ],[
                'rank' => 17,
                'coefficient' => 8.106,
            ],[
                'rank' => 18,
                'coefficient' => 8.522,
            ]
            ,[
                'rank' => 19,
                'coefficient' => 8.943,
            ]
            ,[
                'rank' => 20,
                'coefficient' => 9.371,
            ]
            ,[
                'rank' => 21,
                'coefficient' =>  9.804,
            ],[
                'rank' => 22,
                'coefficient' => 10.24,
            ]
        ];
        \Illuminate\Support\Facades\DB::table('salaries')->insert($salary);
    }
}
