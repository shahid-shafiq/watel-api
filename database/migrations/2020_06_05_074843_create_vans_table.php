<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vans', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');

            $table->string('licenseplate');
            $table->integer('capacity');

            $table->string('drivername');
            $table->string('drivermobile');

            $table->string('loadername');
            $table->string('loadermobile');

            $table->string('helpername');
            $table->string('helpermobile');
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
        Schema::dropIfExists('vans');
    }
}
