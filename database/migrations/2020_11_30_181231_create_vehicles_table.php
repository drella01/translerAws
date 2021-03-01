<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('type_id');
            $table->string('brand')->nullable();
            $table->string('model')->nullable();
            $table->string('registration')->unique()->nullable();
            $table->string('reg_date')->nullable();
            $table->string('kms')->nullable();
            $table->string('tara')->nullable();
            $table->string('mma')->nullable();
            $table->integer('sale_price')->nullable();
            $table->integer('rent_price')->nullable();
            $table->string('description')->nullable();
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
        Schema::dropIfExists('vehicles');
    }
}
