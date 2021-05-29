<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToAxles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('axles', function (Blueprint $table) {
            $table->string('isDir')->nullable()->after('vehicle_id');
            $table->string('isDouble')->nullable()->after('isDir');
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
            $table->dropColumn('isDir');
            $table->dropColumn('isDouble');
        });
    }
}
