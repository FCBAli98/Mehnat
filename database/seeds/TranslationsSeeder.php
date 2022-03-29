<?php

use Illuminate\Database\Seeder;

class TranslationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('translates')->get()->count() == 0){
            $tasks = [
                [
                    'object_type' => 'slider',
                    'object_id' => 1,
                    'object_key' => 'title',
                    'object_value' => 'Главный слайдер RU',
                    'languages' => 'ru',
                    'object' => 'category',
                ],[
                    'object_type' => 'slider',
                    'object_id' => 1,
                    'object_key' => 'title',
                    'object_value' => 'Главный слайдер UZ',
                    'languages' => 'uz',
                    'object' => 'category',
                ],[
                    'object_type' => 'slider',
                    'object_id' => 1,
                    'object_key' => 'title',
                    'object_value' => 'Главный слайдер OZ',
                    'languages' => 'oz',
                    'object' => 'category',
                ],[
                    'object_type' => 'slider',
                    'object_id' => 1,
                    'object_key' => 'title',
                    'object_value' => 'Главный слайдер EN',
                    'languages' => 'en',
                    'object' => 'category',
                ],
                // Меню в шапке
                [
                    'object_type' => 'menu',
                    'object_id' => 2,
                    'object_key' => 'title',
                    'object_value' => 'Меню в шапке RU',
                    'languages' => 'ru',
                    'object' => 'category',
                ],[
                    'object_type' => 'menu',
                    'object_id' => 2,
                    'object_key' => 'title',
                    'object_value' => 'Меню в шапке UZ',
                    'languages' => 'uz',
                    'object' => 'category',
                ],[
                    'object_type' => 'menu',
                    'object_id' => 2,
                    'object_key' => 'title',
                    'object_value' => 'Меню в шапке OZ',
                    'languages' => 'oz',
                    'object' => 'category',
                ],[
                    'object_type' => 'menu',
                    'object_id' => 2,
                    'object_key' => 'title',
                    'object_value' => 'Меню в шапке EN',
                    'languages' => 'en',
                    'object' => 'category',
                ],
                // Онлайн услуги
                [
                    'object_type' => 'services-category',
                    'object_id' => 3,
                    'object_key' => 'title',
                    'object_value' => 'Онлайн услуги',
                    'languages' => 'ru',
                    'object' => 'category',
                ],[
                    'object_type' => 'services-category',
                    'object_id' => 3,
                    'object_key' => 'url',
                    'object_value' => 'onlay-uslugi',
                    'languages' => 'ru',
                    'object' => 'category',
                ],[
                    'object_type' => 'services-category',
                    'object_id' => 3,
                    'object_key' => 'title',
                    'object_value' => 'Onlayn xizmatlar',
                    'languages' => 'oz',
                    'object' => 'category',
                ],[
                    'object_type' => 'services-category',
                    'object_id' => 3,
                    'object_key' => 'url',
                    'object_value' => 'onlayn-xizmatlar',
                    'languages' => 'oz',
                    'object' => 'category',
                ],[
                    'object_type' => 'services-category',
                    'object_id' => 3,
                    'object_key' => 'title',
                    'object_value' => 'Онлайн хизматлар',
                    'languages' => 'uz',
                    'object' => 'category',
                ],[
                    'object_type' => 'services-category',
                    'object_id' => 3,
                    'object_key' => 'url',
                    'object_value' => 'onlayn-xizmatlar',
                    'languages' => 'uz',
                    'object' => 'category',
                ],[
                    'object_type' => 'services-category',
                    'object_id' => 3,
                    'object_key' => 'title',
                    'object_value' => 'Online services',
                    'languages' => 'en',
                    'object' => 'category',
                ],[
                    'object_type' => 'services-category',
                    'object_id' => 3,
                    'object_key' => 'url',
                    'object_value' => 'online-services',
                    'languages' => 'en',
                    'object' => 'category',
                ],
                // Физическим лицам
                [
                    'object_type' => 'services-category',
                    'object_id' => 4,
                    'object_key' => 'title',
                    'object_value' => 'Физическим лицам',
                    'languages' => 'ru',
                    'object' => 'category',
                ],[
                    'object_type' => 'services-category',
                    'object_id' => 4,
                    'object_key' => 'url',
                    'object_value' => 'fizicheskim-litsam',
                    'languages' => 'ru',
                    'object' => 'category',
                ],[
                    'object_type' => 'services-category',
                    'object_id' => 4,
                    'object_key' => 'title',
                    'object_value' => 'Jismoniy shaxslarga',
                    'languages' => 'oz',
                    'object' => 'category',
                ],[
                    'object_type' => 'services-category',
                    'object_id' => 4,
                    'object_key' => 'url',
                    'object_value' => 'jismoniy-shaxslarga',
                    'languages' => 'oz',
                    'object' => 'category',
                ],[
                    'object_type' => 'services-category',
                    'object_id' => 4,
                    'object_key' => 'title',
                    'object_value' => 'Жисмоний шахсларга',
                    'languages' => 'uz',
                    'object' => 'category',
                ],[
                    'object_type' => 'services-category',
                    'object_id' => 4,
                    'object_key' => 'url',
                    'object_value' => 'jismoniy-shaxslarga',
                    'languages' => 'uz',
                    'object' => 'category',
                ],[
                    'object_type' => 'services-category',
                    'object_id' => 4,
                    'object_key' => 'title',
                    'object_value' => 'For individuals',
                    'languages' => 'en',
                    'object' => 'category',
                ],[
                    'object_type' => 'services-category',
                    'object_id' => 4,
                    'object_key' => 'url',
                    'object_value' => 'for-individuals',
                    'languages' => 'en',
                    'object' => 'category',
                ],
                // Юридическим лицам
                [
                    'object_type' => 'services-category',
                    'object_id' => 5,
                    'object_key' => 'title',
                    'object_value' => 'Юридическим лицам',
                    'languages' => 'ru',
                    'object' => 'category',
                ],[
                    'object_type' => 'services-category',
                    'object_id' => 5,
                    'object_key' => 'url',
                    'object_value' => 'yuridicheskim-litsam',
                    'languages' => 'ru',
                    'object' => 'category',
                ],[
                    'object_type' => 'services-category',
                    'object_id' => 5,
                    'object_key' => 'title',
                    'object_value' => 'Yuridik shaxslarga',
                    'languages' => 'oz',
                    'object' => 'category',
                ],[
                    'object_type' => 'services-category',
                    'object_id' => 5,
                    'object_key' => 'url',
                    'object_value' => 'yuridik-shaxslarga',
                    'languages' => 'oz',
                    'object' => 'category',
                ],[
                    'object_type' => 'services-category',
                    'object_id' => 5,
                    'object_key' => 'title',
                    'object_value' => 'Юридик шахсларга',
                    'languages' => 'uz',
                    'object' => 'category',
                ],[
                    'object_type' => 'services-category',
                    'object_id' => 5,
                    'object_key' => 'url',
                    'object_value' => 'yuridik-shaxslarga',
                    'languages' => 'uz',
                    'object' => 'category',
                ],[
                    'object_type' => 'services-category',
                    'object_id' => 5,
                    'object_key' => 'title',
                    'object_value' => 'For corporate',
                    'languages' => 'en',
                    'object' => 'category',
                ],[
                    'object_type' => 'services-category',
                    'object_id' => 5,
                    'object_key' => 'url',
                    'object_value' => 'for-corporate',
                    'languages' => 'en',
                    'object' => 'category',
                ],
                // Информационные услуги
                [
                    'object_type' => 'services-category',
                    'object_id' => 6,
                    'object_key' => 'title',
                    'object_value' => 'Информационные услуги',
                    'languages' => 'ru',
                    'object' => 'category',
                ],[
                    'object_type' => 'services-category',
                    'object_id' => 6,
                    'object_key' => 'url',
                    'object_value' => 'informatsionnye-uslugi',
                    'languages' => 'ru',
                    'object' => 'category',
                ],[
                    'object_type' => 'services-category',
                    'object_id' => 6,
                    'object_key' => 'title',
                    'object_value' => 'Axborot xizmatlari',
                    'languages' => 'oz',
                    'object' => 'category',
                ],[
                    'object_type' => 'services-category',
                    'object_id' => 6,
                    'object_key' => 'url',
                    'object_value' => 'axborot-xizmatlari',
                    'languages' => 'oz',
                    'object' => 'category',
                ],[
                    'object_type' => 'services-category',
                    'object_id' => 6,
                    'object_key' => 'title',
                    'object_value' => 'Ахборот хизматлари',
                    'languages' => 'uz',
                    'object' => 'category',
                ],[
                    'object_type' => 'services-category',
                    'object_id' => 6,
                    'object_key' => 'url',
                    'object_value' => 'axborot-xizmatlari',
                    'languages' => 'uz',
                    'object' => 'category',
                ],[
                    'object_type' => 'services-category',
                    'object_id' => 6,
                    'object_key' => 'title',
                    'object_value' => 'Information Services',
                    'languages' => 'en',
                    'object' => 'category',
                ],[
                    'object_type' => 'services-category',
                    'object_id' => 6,
                    'object_key' => 'url',
                    'object_value' => 'information-services',
                    'languages' => 'en',
                    'object' => 'category',
                ],
                // Сайты государственных органов
                [
                    'object_type' => 'services-category',
                    'object_id' => 7,
                    'object_key' => 'title',
                    'object_value' => 'Сайты государственных органов',
                    'languages' => 'ru',
                    'object' => 'category',
                ],[
                    'object_type' => 'services-category',
                    'object_id' => 7,
                    'object_key' => 'url',
                    'object_value' => 'Sayty-gosudarstvennyx-organov',
                    'languages' => 'ru',
                    'object' => 'category',
                ],[
                    'object_type' => 'services-category',
                    'object_id' => 7,
                    'object_key' => 'title',
                    'object_value' => 'Hukumat saytlari',
                    'languages' => 'oz',
                    'object' => 'category',
                ],[
                    'object_type' => 'services-category',
                    'object_id' => 7,
                    'object_key' => 'url',
                    'object_value' => 'hukumat-saytlari',
                    'languages' => 'oz',
                    'object' => 'category',
                ],[
                    'object_type' => 'services-category',
                    'object_id' => 7,
                    'object_key' => 'title',
                    'object_value' => 'Ҳукумат сайтлари',
                    'languages' => 'uz',
                    'object' => 'category',
                ],[
                    'object_type' => 'services-category',
                    'object_id' => 7,
                    'object_key' => 'url',
                    'object_value' => 'hukumat-saytlari',
                    'languages' => 'uz',
                    'object' => 'category',
                ],[
                    'object_type' => 'services-category',
                    'object_id' => 7,
                    'object_key' => 'title',
                    'object_value' => 'Government sites',
                    'languages' => 'en',
                    'object' => 'category',
                ],[
                    'object_type' => 'services-category',
                    'object_id' => 7,
                    'object_key' => 'url',
                    'object_value' => 'government-sites',
                    'languages' => 'en',
                    'object' => 'category',
                ]
            ];
            DB::table('translates')->insert($tasks);
        }
    }
}
