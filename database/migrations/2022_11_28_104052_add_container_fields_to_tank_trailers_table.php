<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddContainerFieldsToTankTrailersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tank_trailers', function (Blueprint $table) {
            $table->string('large')->nullable();
            $table->string('width')->nullable();
            $table->string('height')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tank_trailers', function (Blueprint $table) {
            $table->dropColumn('large');
            $table->dropColumn('width');
            $table->dropColumn('height');
        });
    }
}
