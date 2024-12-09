<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddWheelbaseColumnToAxlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('axles', function (Blueprint $table) {
            $table->string('wheelbase')->nullable()->after('right_tyre');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('axles', function (Blueprint $table) {
            $table->dropColumn('wheelbase');
        });
    }
}
