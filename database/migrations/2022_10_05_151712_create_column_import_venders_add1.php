<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColumnImportVendersAdd1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('import_venders', function (Blueprint $table) {
            $table->float('overhead', 8, 2)->after('remark')->nullable()->comment('บวกเพิ่ม');
            $table->float('discount', 8, 2)->after('overhead')->nullable()->comment('ส่วนลด');
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
        Schema::table('import_venders', function (Blueprint $table) {
            $table->dropColumn('overhead','discount', 'budget');
        });
    }
}
