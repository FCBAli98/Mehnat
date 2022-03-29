<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('roles')->get()->count() == 0){
            $tasks = [
                    [
                        'id' => 1,
                        'name' => 'admin',
                        'display_name' => 'Admin',
                        'created_at'=>\Carbon\Carbon::now(),
                        'updated_at'=>\Carbon\Carbon::now()
                    ],[
                        'id' => 2,
                        'name' => 'manager',
                    	'display_name' => 'Manager',
                    	'created_at'=>\Carbon\Carbon::now(),
                    	'updated_at'=>\Carbon\Carbon::now()
                    ]
            ];
            DB::table('roles')->insert($tasks);
        }
    }
}
