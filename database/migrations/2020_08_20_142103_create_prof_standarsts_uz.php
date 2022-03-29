<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfStandarstsUz extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professional_standarts_uz', function (Blueprint $table) {
            $table->integer('id');
            $table->text('regionActivite')->comment('Viloyat kasbiy faoliyat')->nullable();
            $table->text('standarbyRregion')->comment('davlat tomonidan ishlab chiqilgan profe stan')->nullable();
            $table->text('view_pro_avtivite')->comment('Korinish kasbiy faoliyatini')->nullable();
            $table->text('latter_toMisistry')->comment('Xat bandlik vazirligiga')->nullable();
            $table->text('registrationNumber')->comment('Professional standart royxatga olish raqami')->nullable();
            $table->text('responseOrganization')->comment('Masuliyatli tashkilot')->nullable();
            $table->text('datainAction')->comment('Kirish sanasi amalda')->nullable();
            $table->text('incamingLatter')->comment('raqami, kirish xatining sanasi')->nullable();
            $table->text('amendedRegisNumber')->comment('Ozgartirilgan standart registratsiya raqami')->nullable();
            $table->text('dataIntraAction')->comment('Kirish sanasi amalda')->nullable();
            $table->json('files')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('professional_standarts_uz');
    }
}
