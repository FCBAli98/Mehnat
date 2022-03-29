<?php

use Illuminate\Database\Seeder;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('role_user')->get()->count() == 0){
            $tasks = [
                    [
                    	'user_id' => 1,
                    	'role_id' => 1,
                    ],[
                    	'user_id' => 2,
                    	'role_id' => 2,
                    ]
            ];
            DB::table('role_user')->insert($tasks);
        }
    }
}
