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

            $table->unsignedBigInteger('med1')->nullable();
            $table->foreign('med1')->references('id')->on('medicaments');
            $table->string('prescripcion1')->nullable();
            $table->string('prescrita1')->nullable();
            $table->string('entregada1')->nullable();

            $table->unsignedBigInteger('med2')->nullable();
            $table->foreign('med2')->references('id')->on('medicaments');
            $table->string('prescripcion2')->nullable();
            $table->string('prescrita2')->nullable();
            $table->string('entregada2')->nullable();

            $table->unsignedBigInteger('med3')->nullable();
            $table->foreign('med3')->references('id')->on('medicaments');
            $table->string('prescripcion3')->nullable();
            $table->string('prescrita3')->nullable();
            $table->string('entregada3')->nullable();

            $table->unsignedBigInteger('med4')->nullable();
            $table->foreign('med4')->references('id')->on('medicaments');
            $table->string('prescripcion4')->nullable();
            $table->string('prescrita4')->nullable();
            $table->string('entregada4')->nullable();

            $table->unsignedBigInteger('med5')->nullable();
            $table->foreign('med5')->references('id')->on('medicaments');
            $table->string('prescripcion5')->nullable();
            $table->string('prescrita5')->nullable();
            $table->string('entregada5')->nullable();

            $table->unsignedBigInteger('med6')->nullable();
            $table->foreign('med6')->references('id')->on('medicaments');
            $table->string('prescripcion6')->nullable();
            $table->string('prescrita6')->nullable();
            $table->string('entregada6')->nullable();

            $table->unsignedBigInteger('med7')->nullable();
            $table->foreign('med7')->references('id')->on('medicaments');
            $table->string('prescripcion7')->nullable();
            $table->string('prescrita7')->nullable();
            $table->string('entregada7')->nullable();

            $table->unsignedBigInteger('med8')->nullable();
            $table->foreign('med8')->references('id')->on('medicaments');
            $table->string('prescripcion8')->nullable();
            $table->string('prescrita8')->nullable();
            $table->string('entregada8')->nullable();

            $table->unsignedBigInteger('med9')->nullable();
            $table->foreign('med9')->references('id')->on('medicaments');
            $table->string('prescripcion9')->nullable();
            $table->string('prescrita9')->nullable();
            $table->string('entregada9')->nullable();

            $table->unsignedBigInteger('med10')->nullable();
            $table->foreign('med10')->references('id')->on('medicaments');
            $table->string('prescripcion10')->nullable();
            $table->string('prescrita10')->nullable();
            $table->string('entregada10')->nullable();

            $table->unsignedBigInteger('med11')->nullable();
            $table->foreign('med11')->references('id')->on('medicaments');
            $table->string('prescripcion11')->nullable();
            $table->string('prescrita11')->nullable();
            $table->string('entregada11')->nullable();

            $table->unsignedBigInteger('med12')->nullable();
            $table->foreign('med12')->references('id')->on('medicaments');
            $table->string('prescripcion12')->nullable();
            $table->string('prescrita12')->nullable();
            $table->string('entregada12')->nullable();

            $table->unsignedBigInteger('med13')->nullable();
            $table->foreign('med13')->references('id')->on('medicaments');
            $table->string('prescripcion13')->nullable();
            $table->string('prescrita13')->nullable();
            $table->string('entregada13')->nullable();

            $table->unsignedBigInteger('med14')->nullable();
            $table->foreign('med14')->references('id')->on('medicaments');
            $table->string('prescripcion14')->nullable();
            $table->string('prescrita14')->nullable();
            $table->string('entregada14')->nullable();

            $table->unsignedBigInteger('med15')->nullable();
            $table->foreign('med15')->references('id')->on('medicaments');
            $table->string('prescripcion15')->nullable();
            $table->string('prescrita15')->nullable();
            $table->string('entregada15')->nullable();

            $table->unsignedBigInteger('med16')->nullable();
            $table->foreign('med16')->references('id')->on('medicaments');
            $table->string('prescripcion16')->nullable();
            $table->string('prescrita16')->nullable();
            $table->string('entregada16')->nullable();

            $table->unsignedBigInteger('med17')->nullable();
            $table->foreign('med17')->references('id')->on('medicaments');
            $table->string('prescripcion17')->nullable();
            $table->string('prescrita17')->nullable();
            $table->string('entregada17')->nullable();

            $table->unsignedBigInteger('med18')->nullable();
            $table->foreign('med18')->references('id')->on('medicaments');
            $table->string('prescripcion18')->nullable();
            $table->string('prescrita18')->nullable();
            $table->string('entregada18')->nullable();

            $table->unsignedBigInteger('med19')->nullable();
            $table->foreign('med19')->references('id')->on('medicaments');
            $table->string('prescripcion19')->nullable();
            $table->string('prescrita19')->nullable();
            $table->string('entregada19')->nullable();

            $table->unsignedBigInteger('med20')->nullable();
            $table->foreign('med20')->references('id')->on('medicaments');
            $table->string('prescripcion20')->nullable();
            $table->string('prescrita20')->nullable();
            $table->string('entregada20')->nullable();
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
