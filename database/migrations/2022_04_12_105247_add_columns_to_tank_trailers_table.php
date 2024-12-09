<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToTankTrailersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tank_trailers', function (Blueprint $table) {
            $table->string('thickness')->nullable();
            $table->string('heating')->nullable();
            $table->string('heating_type')->nullable();
            $table->string('insulation')->nullable();
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
            $table->dropColumn('thickness');
            $table->dropColumn('heating');
            $table->dropColumn('heating_type');
            $table->dropColumn('insulation');
        });
    }
}
