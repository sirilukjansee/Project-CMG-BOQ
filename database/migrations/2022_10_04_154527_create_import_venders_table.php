<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImportVendersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('import_venders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_project')->comment('id จาก project ไหน')->nullable();
            $table->foreignId('id_vender')->comment('id จาก vender ไหน')->nullable();
            $table->string('remark')->comment('รายละเอียด')->nullable();
            $table->foreignId('create_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('import_venders');
    }
}
