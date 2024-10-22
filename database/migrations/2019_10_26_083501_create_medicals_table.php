<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicals', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('order_id');
            $table->foreign('order_id')->references('id')->on('orders');

            $table->string('patient')->nullable();
            $table->string('room')->nullable();
            $table->string('shift')->nullable();

            $table->string('hour_hd')->nullable();
            $table->string('heparin')->nullable();
            $table->string('dry_weight')->nullable();
            $table->string('start_weight')->nullable();
            $table->string('uf')->nullable();
            $table->string('qb')->nullable();
            $table->string('qd')->nullable();
            $table->string('bicarbonat')->nullable();
            $table->string('cnd')->nullable();
            $table->string('start_na')->nullable();
            $table->string('end_na')->nullable();
            $table->string('start_pa')->nullable();
            $table->string('profile_na')->nullable();
            $table->string('profile_uf')->nullable();
            $table->string('area_filter')->nullable();
            $table->string('membrane')->nullable();
            $table->text('clinical_trouble')->nullable();
            $table->string('fc')->nullable();
            $table->text('evaluation')->nullable();
            $table->text('end_evaluation')->nullable();
            $table->string('start_hour')->nullable();
            $table->string('end_hour')->nullable();
            $table->text('indications')->nullable();
            $table->string('serology')->nullable();

            /*

                $table->string('bathroom')->nullable();
                $table->string('temperature')->nullable();
                $table->string('serological')->nullable();
            */

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
        Schema::dropIfExists('medicals');
    }
}
