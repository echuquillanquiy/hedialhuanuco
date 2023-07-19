<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('order_id');
            $table->foreign('order_id')->references('id')->on('orders');

            $table->unsignedBigInteger('patient_id');
            $table->foreign('patient_id')->references('id')->on('patients');

            $table->string('med1', 50)->nullable();
            $table->string('code1', 7)->nullable();
            $table->string('prescripcion1', 50)->nullable();
            $table->string('prescrita1', 3)->nullable();
            $table->string('entregada1', 3)->nullable();

            $table->string('med2', 50)->nullable();
            $table->string('code2', 7)->nullable();
            $table->string('prescripcion2', 50)->nullable();
            $table->string('prescrita2', 3)->nullable();
            $table->string('entregada2', 3)->nullable();

            $table->string('med3', 50)->nullable();
            $table->string('code3', 7)->nullable();
            $table->string('prescripcion3', 50)->nullable();
            $table->string('prescrita3', 3)->nullable();
            $table->string('entregada3', 3)->nullable();

            $table->string('med4', 50)->nullable();
            $table->string('code4', 7)->nullable();
            $table->string('prescripcion4', 50)->nullable();
            $table->string('prescrita4', 3)->nullable();
            $table->string('entregada4', 3)->nullable();

            $table->string('med5', 50)->nullable();
            $table->string('code5', 7)->nullable();
            $table->string('prescripcion5', 50)->nullable();
            $table->string('prescrita5', 3)->nullable();
            $table->string('entregada5', 3)->nullable();

            $table->string('med6', 50)->nullable();
            $table->string('code6', 7)->nullable();
            $table->string('prescripcion6', 50)->nullable();
            $table->string('prescrita6', 3)->nullable();
            $table->string('entregada6', 3)->nullable();

            $table->string('med7', 50)->nullable();
            $table->string('code7', 7)->nullable();
            $table->string('prescripcion7', 50)->nullable();
            $table->string('prescrita7', 3)->nullable();
            $table->string('entregada7', 3)->nullable();

            $table->string('med8', 50)->nullable();
            $table->string('code8', 7)->nullable();
            $table->string('prescripcion8', 50)->nullable();
            $table->string('prescrita8', 3)->nullable();
            $table->string('entregada8', 3)->nullable();

            $table->string('med9', 50)->nullable();
            $table->string('code9', 7)->nullable();
            $table->string('prescripcion9', 50)->nullable();
            $table->string('prescrita9', 3)->nullable();
            $table->string('entregada9', 3)->nullable();

            $table->string('med10', 50)->nullable();
            $table->string('code10', 7)->nullable();
            $table->string('prescripcion10', 50)->nullable();
            $table->string('prescrita10', 3)->nullable();
            $table->string('entregada10', 3)->nullable();

            $table->string('med11', 50)->nullable();
            $table->string('code11', 7)->nullable();
            $table->string('prescripcion11', 50)->nullable();
            $table->string('prescrita11', 3)->nullable();
            $table->string('entregada11', 3)->nullable();

            $table->string('med12', 50)->nullable();
            $table->string('code12', 7)->nullable();
            $table->string('prescripcion12', 50)->nullable();
            $table->string('prescrita12', 3)->nullable();
            $table->string('entregada12', 3)->nullable();

            $table->string('med13', 50)->nullable();
            $table->string('code13', 7)->nullable();
            $table->string('prescripcion13', 50)->nullable();
            $table->string('prescrita13', 3)->nullable();
            $table->string('entregada13', 3)->nullable();

            $table->string('med14', 50)->nullable();
            $table->string('code14', 7)->nullable();
            $table->string('prescripcion14', 50)->nullable();
            $table->string('prescrita14', 3)->nullable();
            $table->string('entregada14', 3)->nullable();

            $table->string('med15', 50)->nullable();
            $table->string('code15', 7)->nullable();
            $table->string('prescripcion15', 50)->nullable();
            $table->string('prescrita15', 3)->nullable();
            $table->string('entregada15', 3)->nullable();


            $table->string('date_order')->nullable();

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
        Schema::dropIfExists('recipes');
    }
}
