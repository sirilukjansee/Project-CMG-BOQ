<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColumnCapexAdd1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('capexes', function (Blueprint $table) {
            $table->string('code_cat')->after('boq_id')->comment('code ของแต่ละหมวด');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('capexes', function (Blueprint $table) {
            $table->dropColumn('code_cat');
        });
    }
}
