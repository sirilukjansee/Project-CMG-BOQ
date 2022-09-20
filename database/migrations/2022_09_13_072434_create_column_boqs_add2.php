<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColumnBoqsAdd2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('boqs', function (Blueprint $table) {
            $table->foreignId('vender_id')->after('comment')->comment('ชื่อของ vender')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('boqs', function (Blueprint $table) {
            $table->dropColumn('vender');
        });
    }
}
