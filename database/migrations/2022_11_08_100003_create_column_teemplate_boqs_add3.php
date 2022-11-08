<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColumnTeemplateBoqsAdd3 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('template_boqs', function (Blueprint $table) {
            $table->string('remark')->after('comment')->nullable()->comment('remark');
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
            $table->dropColumn('remark');
        });
    }
}
