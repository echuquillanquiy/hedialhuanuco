<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMedToMedicals extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('medicals', function (Blueprint $table) {
            $table->string('epo')->nullable();
            $table->string('iron')->nullable();
            $table->string('vitb12')->nullable();
            $table->string('calci')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('medicals', function (Blueprint $table) {

        });
    }
}
