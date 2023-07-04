<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consults', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('patient_id');
            $table->foreign('patient_id')->references('id')->on('patients');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->enum('type_consult', [1,7,8,10])->default(1);
            $table->string('registration_date')->nullable();
            $table->string('cie1', 10)->nullable();
            $table->string('dx1')->nullable();
            $table->string('type_dx1')->nullable();
            $table->string('cie2', 10)->nullable();
            $table->string('dx2')->nullable();
            $table->string('type_dx2')->nullable();
            $table->string('cie3', 10)->nullable();
            $table->string('dx3')->nullable();
            $table->string('type_dx3')->nullable();
            $table->string('cie4', 10)->nullable();
            $table->string('dx4')->nullable();
            $table->string('type_dx4')->nullable();

            $table->integer('n_fua');


            $table->unsignedBigInteger('code1')->nullable();
            $table->foreign('code1')->references('id')->on('medicaments');
            $table->string('cant1')->nullable();

            $table->unsignedBigInteger('code2')->nullable();
            $table->foreign('code2')->references('id')->on('medicaments');
            $table->string('cant2')->nullable();

            $table->unsignedBigInteger('code3')->nullable();
            $table->foreign('code3')->references('id')->on('medicaments');
            $table->string('cant3')->nullable();

            $table->unsignedBigInteger('code4')->nullable();
            $table->foreign('code4')->references('id')->on('medicaments');
            $table->string('cant4')->nullable();

            $table->unsignedBigInteger('code5')->nullable();
            $table->foreign('code5')->references('id')->on('medicaments');
            $table->string('cant5')->nullable();

            $table->unsignedBigInteger('code6')->nullable();
            $table->foreign('code6')->references('id')->on('medicaments');
            $table->string('cant6')->nullable();

            $table->unsignedBigInteger('code7')->nullable();
            $table->foreign('code7')->references('id')->on('medicaments');
            $table->string('cant7')->nullable();

            $table->unsignedBigInteger('code8')->nullable();
            $table->foreign('code8')->references('id')->on('medicaments');
            $table->string('cant8')->nullable();

            $table->unsignedBigInteger('code9')->nullable();
            $table->foreign('code9')->references('id')->on('medicaments');
            $table->string('cant9')->nullable();

            $table->unsignedBigInteger('code10')->nullable();
            $table->foreign('code10')->references('id')->on('medicaments');
            $table->string('cant10')->nullable();

            $table->unsignedBigInteger('code11')->nullable();
            $table->foreign('code11')->references('id')->on('medicaments');
            $table->string('cant11')->nullable();

            $table->unsignedBigInteger('code12')->nullable();
            $table->foreign('code12')->references('id')->on('medicaments');
            $table->string('cant12')->nullable();

            $table->unsignedBigInteger('code13')->nullable();
            $table->foreign('code13')->references('id')->on('medicaments');
            $table->string('cant13')->nullable();

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
        Schema::dropIfExists('consults');
    }
}
