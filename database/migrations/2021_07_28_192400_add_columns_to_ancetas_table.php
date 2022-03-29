<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToAncetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ancetas', function (Blueprint $table) {
            $table->integer('region_id')->nullable();
            $table->integer('city_id')->nullable();
            $table->string('date')->nullable();
            $table->string('sixth')->nullable();
            $table->string('seventh')->nullable();
            $table->string('eighth')->nullable();
            $table->string('ninth')->nullable();
            $table->text('tenth')->nullable();
            $table->text('eleventh')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ancetas', function (Blueprint $table) {
            //
        });
    }
}
