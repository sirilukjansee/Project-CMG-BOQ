<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColumnImportVender extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('import_venders', function (Blueprint $table) {
            $table->foreignId('template_id')->after('id_vender')->comment('id จาก template ไหน')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Import_vender', function (Blueprint $table) {
            $table->dropColumn('template_id');
        });
    }
}
