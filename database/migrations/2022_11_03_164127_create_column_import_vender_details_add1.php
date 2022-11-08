<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColumnImportVenderDetailsAdd1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('import_vender_details', function (Blueprint $table) {
            $table->float('width', 8, 2)->after('sub_id')->nullable()->comment('กว้าง');
            $table->float('depth', 8, 2)->after('width')->nullable()->comment('ยาว');
            $table->float('height', 8, 2)->after('depth')->nullable()->comment('สูง');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('import_vender_details', function (Blueprint $table) {
            $table->dropColumn('width','depth','height');
        });
    }
}
