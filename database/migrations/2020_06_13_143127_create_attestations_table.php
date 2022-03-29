<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttestationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attestations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('region_id')->nullable()->unsigned()->index();
            $table->integer('city_id')->nullable()->unsigned()->index();
            $table->string('conclusion_number')->nullable();
            $table->date('conclusion_date')->nullable();
            $table->text('company_name')->nullable();
            $table->string('company_tin', 9)->nullable();
            $table->string('xxtut', 255)->nullable();
            $table->string('mxbt')->nullable();
            $table->text('company_id')->nullable();
            $table->integer('positions_count')->nullable();
            $table->integer('number')->nullable();
            $table->text('attestation_company')->nullable();
            $table->text('attestation_address')->nullable();
            $table->string('attestation_tin', 9)->nullable();
            $table->string('certification_number')->nullable();
            $table->date('expired_at')->nullable();
            $table->integer('payed_amount')->nullable();
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
        Schema::dropIfExists('attestations');
    }
}
