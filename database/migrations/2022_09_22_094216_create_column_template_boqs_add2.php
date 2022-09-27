<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColumnTemplateBoqsAdd2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('template_boqs', function (Blueprint $table) {
            $table->foreignId('ref_template')->after('vender_id')->comment('เพิ่ม column ref มาจาก template ไหน')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('template_boqs', function (Blueprint $table) {
            $table->dropColumn('ref');
        });
    }
}
