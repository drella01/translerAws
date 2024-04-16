<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Vehicles', function (Blueprint $table) {
            $table->string('n_tyres')->nullable()->after('tyres');
            $table->string('n_gears')->nullable()->after('gearbox');
            $table->string('engine_displacement')->nullable()->after('power');
            $table->string('hidraulic_equipment')->nullable()->after('abs');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Vehicles', function (Blueprint $table) {
            $table->dropColumn('n_tyres');
            $table->dropColumn('n_gears');
            $table->dropColumn('engine_displacement');
            $table->dropColumn('hidraulic_equipment');
        });
    }
}
