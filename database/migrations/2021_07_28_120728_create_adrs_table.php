<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adrs', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('vehicle_id')->nullable();
            $table->string('adr_code')->nullable();
            $table->string('adr_class')->nullable();
            $table->string('date_from')->nullable();
            $table->string('date_to')->nullable();
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
        Schema::dropIfExists('adrs');
    }
}
