<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('categories')->get()->count() == 0){
            $tasks = [
                    [//Главный слайдер
                    	'id' => 1,
                        'type' => 'slider',
                        'parent_id' => null,
                        'created_at'=>\Carbon\Carbon::now(),
                        'updated_at'=>\Carbon\Carbon::now(),
                        'anchor' => 'mainSlider'
                    ],[// Меню в шапке
                    	'id' => 2,
                        'type' => 'menu',
                        'parent_id' => null,
                        'created_at'=>\Carbon\Carbon::now(),
                        'updated_at'=>\Carbon\Carbon::now(),
                        'anchor' => 'headerMenu'
                    ],[// Онлай услуги
                    	'id' => 3,
                        'type' => 'services-category',
                        'parent_id' => null,
                        'created_at'=>\Carbon\Carbon::now(),
                        'updated_at'=>\Carbon\Carbon::now(),
                        'anchor' => 'onlineServices'
                    ],[// Физическим лицам
                    	'id' => 4,
                        'type' => 'services-category',
                        'parent_id' => 3,
                        'created_at'=>\Carbon\Carbon::now(),
                        'updated_at'=>\Carbon\Carbon::now(),
                        'anchor' => null
                    ],[// Юридическим лицам
                    	'id' => 5,
                        'type' => 'services-category',
                        'parent_id' => 3,
                        'created_at'=>\Carbon\Carbon::now(),
                        'updated_at'=>\Carbon\Carbon::now(),
                        'anchor' => null
                    ],[// Информационные услуги
                    	'id' => 6,
                        'type' => 'services-category',
                        'parent_id' => null,
                        'created_at'=>\Carbon\Carbon::now(),
                        'updated_at'=>\Carbon\Carbon::now(),
                        'anchor' => 'informationServices'
                    ],[// Сайты государственных органов
                    	'id' => 7,
                        'type' => 'slider',
                        'parent_id' => null,
                        'created_at'=>\Carbon\Carbon::now(),
                        'updated_at'=>\Carbon\Carbon::now(),
                        'anchor' => 'linksSlider'
                    ]
            ];
            DB::table('categories')->insert($tasks);
        }
    }
}
