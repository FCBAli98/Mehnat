<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAncetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ancetas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('phone')->nullable();
            $table->string('passport')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('street')->nullable();
            $table->string('FIO')->nullable();
            $table->string('edu_center')->nullable();
            $table->string('speciality')->nullable();
            $table->string('first')->nullable();
            $table->string('second')->nullable();
            $table->string('third')->nullable();
            $table->string('fourth')->nullable();
            $table->text('fifth')->nullable();
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
        Schema::dropIfExists('ancetas');
    }
}
