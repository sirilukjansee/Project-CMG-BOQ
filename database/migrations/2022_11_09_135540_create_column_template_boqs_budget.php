<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColumnTemplateBoqsBudget extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('template_boqs', function (Blueprint $table) {
            $table->float('budget', 8, 2)->after('discount')->nullable()->comment('ราคารวม');
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
            $table->dropColumn('budget');
        });
    }
}
