<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('users')->get()->count() == 0){
            $tasks = [
                    [
                        'id' => 1,
                        'name' => 'admin',
                        'email' => null,
                        'password' => bcrypt('smartlab2020'),
                        'created_at'=>\Carbon\Carbon::now(),
                        'updated_at'=>\Carbon\Carbon::now()
                    ],[
                        'id' => 2,
                    	'name' => 'manager',
                    	'email' => null,
                    	'password' => bcrypt('smartlab2020'),
                    	'created_at'=>\Carbon\Carbon::now(),
                    	'updated_at'=>\Carbon\Carbon::now()
                    ]
            ];
            DB::table('users')->insert($tasks);
        }
    }
}
