<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nurses', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('order_id');
            $table->foreign('order_id')->references('id')->on('orders');

            $table->string('patient')->nullable();
            $table->string('room')->nullable();
            $table->string('shift')->nullable();

            $table->integer('hcl')->nullable();
            $table->string('frequency')->nullable();
            $table->integer('nhd')->nullable();
            $table->string('others')->nullable();
            $table->string('start_pa')->nullable();
            $table->string('end_pa')->nullable();
            $table->string('start_weight')->nullable();
            $table->string('end_weight')->nullable();
            $table->string('machine')->nullable();
            $table->string('brand_model')->default('FRESENIUS/4008S');
            $table->string('position', 25)->nullable();
            $table->string('filter')->nullable();
            $table->string('uf')->nullable();
            $table->string('access_arterial')->nullable();
            $table->string('access_venoso')->nullable();
            $table->string('iron')->nullable();
            $table->string('epo2000')->nullable();
            $table->string('epo4000')->nullable();
            $table->string('hidroxi')->nullable();
            $table->string('calcitriol')->nullable();
            $table->string('others_med')->nullable();
            $table->text('end_observation')->nullable();
            $table->string('aspect_dializer')->nullable();

            //Valoracion de enfermeria
            $table->text('s')->nullable();
            $table->text('o')->nullable();
            $table->text('a')->nullable();
            $table->text('p')->nullable();
            //Termina valoracion

            $table->string('hr', 25)->nullable();
            $table->string('pa', 25)->nullable();
            $table->string('fc1', 25, 25)->nullable();
            $table->string('qb', 25)->nullable();
            $table->string('cnd', 25)->nullable();
            $table->string('ra', 25)->nullable();
            $table->string('rv', 25)->nullable();
            $table->string('ptm', 25)->nullable();
            $table->text('sol_hemodev')->nullable();
            $table->text('obs')->nullable();

            $table->string('hr2', 25)->nullable();
            $table->string('pa2', 25)->nullable();
            $table->string('fc2', 25)->nullable();
            $table->string('qb2', 25)->nullable();
            $table->string('cnd2', 25)->nullable();
            $table->string('ra2', 25)->nullable();
            $table->string('rv2', 25)->nullable();
            $table->string('ptm2', 25)->nullable();
            $table->text('sol_hemodev2')->nullable();
            $table->text('obs2')->nullable();

            $table->string('hr3', 25)->nullable();
            $table->string('pa3', 25)->nullable();
            $table->string('fc3', 25)->nullable();
            $table->string('qb3', 25)->nullable();
            $table->string('cnd3', 25)->nullable();
            $table->string('ra3', 25)->nullable();
            $table->string('rv3', 25)->nullable();
            $table->string('ptm3', 25)->nullable();
            $table->text('sol_hemodev3')->nullable();
            $table->text('obs3')->nullable();

            $table->string('hr4', 25)->nullable();
            $table->string('pa4', 25)->nullable();
            $table->string('fc4', 25)->nullable();
            $table->string('qb4', 25)->nullable();
            $table->string('cnd4', 25)->nullable();
            $table->string('ra4', 25)->nullable();
            $table->string('rv4', 25)->nullable();
            $table->string('ptm4', 25)->nullable();
            $table->text('sol_hemodev4')->nullable();
            $table->text('obs4')->nullable();

            $table->string('hr5', 25)->nullable();
            $table->string('pa5', 25)->nullable();
            $table->string('fc5', 25)->nullable();
            $table->string('qb5', 25)->nullable();
            $table->string('cnd5', 25)->nullable();
            $table->string('ra5', 25)->nullable();
            $table->string('rv5', 25)->nullable();
            $table->string('ptm5', 25)->nullable();
            $table->text('sol_hemodev5')->nullable();
            $table->text('obs5')->nullable();

            $table->string('estado')->default('PENDIENTE');


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
        Schema::dropIfExists('nurses');
    }
}
