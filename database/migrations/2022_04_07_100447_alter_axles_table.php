<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterAxlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Axles', function (Blueprint $table) {
            $table->string('lifting_axle')->nullable()->after('isDouble');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Axles', function (Blueprint $table) {
            $table->dropColumn('lifting_axle');
        });
    }
}
