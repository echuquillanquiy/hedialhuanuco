<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('name')->nullable();
            $table->string('dni')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('documento')->nullable();
            $table->string('age')->nullable();
            $table->string('acceso1')->nullable();
            $table->string('acceso2')->nullable();
            $table->string('civil_status')->nullable();
            $table->string('instruction')->nullable();
            $table->string('ocupation')->nullable();
            $table->string('condition')->nullable();
            $table->string('last_job')->nullable();
            $table->string('hosp_origin')->nullable();
            $table->string('code')->nullable(); //15 digitos

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
        Schema::dropIfExists('patients');
    }
}
