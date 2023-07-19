<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNephrologiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nephrologies', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('order_id');
            $table->foreign('order_id')->references('id')->on('orders');

            $table->unsignedBigInteger('patient_id');
            $table->foreign('patient_id')->references('id')->on('patients');

            //parte 1
            $table->string('consult')->nullable();
            $table->string('time_disease')->nullable();
            $table->string('anamnesis')->nullable();
            $table->string('date_start')->nullable();
            $table->string('etiology')->nullable();
            $table->string('access')->nullable();
            $table->string('desc_access')->nullable();
            $table->string('symptoms')->nullable();
            $table->string('temperature')->nullable();
            $table->string('pa')->nullable();
            $table->string('fc')->nullable();
            $table->string('fr')->nullable();
            $table->string('peso')->nullable();
            $table->string('talla')->nullable();
            $table->string('imc')->nullable();
            $table->string('{{physical_observation}}')->nullable();
            $table->string('torax_pulmones')->nullable();
            $table->string('cardio')->nullable();
            $table->string('diuresis')->nullable();
            $table->string('dx1')->nullable();
            $table->string('cie1')->nullable();
            $table->string('dx2')->nullable();
            $table->string('cie2')->nullable();
            $table->string('dx3')->nullable();
            $table->string('cie3')->nullable();
            $table->string('dx4')->nullable();
            $table->string('cie4')->nullable();
            $table->string('preescripcion')->nullable();
            $table->string('tiempo_hd')->nullable();
            $table->string('area_filtro')->nullable();

            //parte 2
            $table->enum('anemia', ['SI', 'NO'])->default('SI');
            $table->string('hb')->nullable();
            $table->string('epo2000')->nullable();
            $table->string('epo4000')->nullable();
            $table->string('vitb12')->nullable();
            $table->string('hierro')->nullable();
            $table->string('observacion')->nullable();

            $table->enum('alteracion_meta', ['SI', 'NO'])->default('SI');
            $table->text('especificacion')->nullable();

            $table->enum('antihipertensivos', ['SI', 'NO'])->default('SI');
            $table->text('especificacion2')->nullable();

            $table->text('otros_med')->nullable();

            //parte 3
            $table->text('solicitud')->nullable();
            $table->string('date_lab')->nullable();
            $table->string('date_appointment')->nullable();
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
        Schema::dropIfExists('nephrologies');
    }
}
