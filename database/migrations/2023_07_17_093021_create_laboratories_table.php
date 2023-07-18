<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaboratoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laboratories', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('order_id');
            $table->foreign('order_id')->references('id')->on('orders');

            $table->unsignedBigInteger('patient_id');
            $table->foreign('patient_id')->references('id')->on('patients');

            $table->string('description1', 150)->nullable();
            $table->string('code1', 10)->nullable();
            $table->string('cant1', 10)->nullable();
            $table->string('pre', 10)->nullable();
            $table->string('post', 10)->nullable();

            $table->string('description2', 150)->nullable();
            $table->string('code2', 10)->nullable();
            $table->string('cant2', 10)->nullable();
            $table->string('result2', 10)->nullable();

            $table->string('description3', 150)->nullable();
            $table->string('code3', 10)->nullable();
            $table->string('cant3', 10)->nullable();
            $table->string('result3', 10)->nullable();

            $table->string('description4', 150)->nullable();
            $table->string('code4', 10)->nullable();
            $table->string('cant4', 10)->nullable();
            $table->string('sodio', 10)->nullable();
            $table->string('cloro', 10)->nullable();
            $table->string('potasio', 10)->nullable();

            $table->string('description5', 150)->nullable();
            $table->string('code5', 10)->nullable();
            $table->string('cant5', 10)->nullable();
            $table->string('result5', 10)->nullable();

            $table->string('description6', 150)->nullable();
            $table->string('code6', 10)->nullable();
            $table->string('cant6', 10)->nullable();
            $table->string('result6', 10)->nullable();

            $table->string('description7', 150)->nullable();
            $table->string('code7', 10)->nullable();
            $table->string('cant7', 10)->nullable();
            $table->string('result7', 10)->nullable();

            $table->string('description8', 150)->nullable();
            $table->string('code8', 10)->nullable();
            $table->string('cant8', 10)->nullable();
            $table->string('result8', 10)->nullable();

            $table->string('description9', 150)->nullable();
            $table->string('code9', 10)->nullable();
            $table->string('cant9', 10)->nullable();
            $table->string('result9', 10)->nullable();

            $table->string('description10')->nullable();
            $table->string('code10', 10)->nullable();
            $table->string('cant10', 10)->nullable();
            $table->string('result10', 10)->nullable();

            $table->string('description11')->nullable();
            $table->string('code11', 10)->nullable();
            $table->string('cant11', 10)->nullable();
            $table->string('result11', 10)->nullable();

            $table->string('description12')->nullable();
            $table->string('code12', 10)->nullable();
            $table->string('cant12', 10)->nullable();
            $table->string('result12', 10)->nullable();

            $table->string('description13')->nullable();
            $table->string('code13', 10)->nullable();
            $table->string('cant13', 10)->nullable();
            $table->string('result13', 10)->nullable();

            $table->string('description14')->nullable();
            $table->string('code14', 10)->nullable();
            $table->string('cant14', 10)->nullable();
            $table->string('result14', 10)->nullable();

            $table->string('description15')->nullable();
            $table->string('code15', 10)->nullable();
            $table->string('cant15', 10)->nullable();
            $table->string('result15', 10)->nullable();

            $table->string('description16')->nullable();
            $table->string('code16', 10)->nullable();
            $table->string('cant16', 10)->nullable();
            $table->string('result16', 10)->nullable();

            $table->string('description17')->nullable();
            $table->string('code17', 10)->nullable();
            $table->string('cant17', 10)->nullable();
            $table->string('result17', 10)->nullable();

            $table->string('description18')->nullable();
            $table->string('code18', 10)->nullable();
            $table->string('cant18', 10)->nullable();
            $table->string('result18', 10)->nullable();

            $table->string('description19')->nullable();
            $table->string('code19', 10)->nullable();
            $table->string('cant19', 10)->nullable();
            $table->string('result19', 10)->nullable();

            $table->string('description20')->nullable();
            $table->string('code20', 10)->nullable();
            $table->string('cant20', 10)->nullable();
            $table->string('result20', 10)->nullable();

            $table->string('description21')->nullable();
            $table->string('code21', 10)->nullable();
            $table->string('cant21', 10)->nullable();
            $table->string('result21', 10)->nullable();

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
        Schema::dropIfExists('laboratories');
    }
}
