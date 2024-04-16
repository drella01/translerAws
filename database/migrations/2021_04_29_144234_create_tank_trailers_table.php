<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTankTrailersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tank_trailers', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('vehicle_id')->nullable();
            $table->string('madeof')->nullable();
            $table->string('fuel')->nullable();
            $table->string('volume')->nullable();
            $table->string('compartemnts')->nullable();
            $table->string('liters1')->nullable();
            $table->string('liters2')->nullable();
            $table->string('liters3')->nullable();
            $table->string('liters4')->nullable();
            $table->string('liters5')->nullable();
            $table->string('liters6')->nullable();
            $table->string('degassed')->nullable();
            $table->string('counter')->nullable();
            $table->string('bombBrand')->nullable();
            $table->string('minLPM')->nullable();
            $table->string('maxLPM')->nullable();
            $table->string('hose')->nullable();
            $table->string('hose1Lenght')->nullable();
            $table->string('hose2Lenght')->nullable();
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
        Schema::dropIfExists('tank_trailers');
    }
}
