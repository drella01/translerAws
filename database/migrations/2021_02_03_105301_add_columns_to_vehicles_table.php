<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vehicles', function (Blueprint $table) {
            $table->string('chassis_number')->nullable()->after('registration');
            $table->unsignedInteger('power')->nullable();
            $table->string('gearbox')->nullable();
            $table->string('break_retarder')->nullable();
            $table->string('break_retarder_type')->nullable();
            $table->string('differential_lock')->nullable();
            $table->string('euro_standard')->nullable();
            $table->string('abs')->nullable();
            $table->string('chassis_height')->nullable();
            $table->string('fifth_wheel_height')->nullable();
            $table->string('bolt_diameter')->nullable();
            $table->unsignedInteger('axles')->nullable();
            $table->unsignedInteger('drive_axles')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vehicles', function (Blueprint $table) {
            $table->dropColumn('chassis_number');
            $table->dropColumn('power');
            $table->dropColumn('gearbox');
            $table->dropColumn('break_retarder');
            $table->dropColumn('break_retarder_type');
            $table->dropColumn('differential_lock');
            $table->dropColumn('euro_standard');
            $table->dropColumn('abs');
            $table->dropColumn('chassis_height');
            $table->dropColumn('fifth_wheel_height');
            $table->dropColumn('bolt_diameter');
            $table->dropColumn('axles');
            $table->dropColumn('drive_axles');
        });
    }
}
