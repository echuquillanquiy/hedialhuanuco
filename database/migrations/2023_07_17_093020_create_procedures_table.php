<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProceduresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('procedures', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('description');
            $table->string('code')->unique();
            $table->string('unit')->default('EXAMEN');
            $table->unsignedInteger('amount');
            $table->enum('frequency', ['MENSUAL', 'TRIMESTRAL', 'BIMESTRAL', 'SEMESTRAL', 'ANUAL']);
            $table->string('observation')->nullable();

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
        Schema::dropIfExists('procedures');
    }
}
