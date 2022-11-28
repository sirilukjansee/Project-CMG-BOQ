<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColumnAuctualAdd1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('auctuals', function (Blueprint $table) {
            $table->string('code_cat')->after('boq_id')->nullable()->comment('code ของแต่ละหมวด');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('auctuals', function (Blueprint $table) {
            $table->dropColumn('code_cat');
        });
    }
}
