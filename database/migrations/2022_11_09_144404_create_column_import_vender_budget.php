<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColumnImportVenderBudget extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('import_venders', function (Blueprint $table) {
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
            $table->dropColumn('budget');
        });
    }
}
