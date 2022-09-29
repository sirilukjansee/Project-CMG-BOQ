<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColumnBoqsAdd4 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('boqs', function (Blueprint $table) {
            $table->float('each_unit', 8, 2)->after('material_cost')->default('0')->nullable()->comment('ยอดรวมต่อหน่วย');
            $table->float('all_unit', 8, 2)->after('each_unit')->default('0')->nullable()->comment('ยอดรวมทั้งหมด');
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
            $table->dropColumn('each_unit','all_unit');
        });
    }
}
