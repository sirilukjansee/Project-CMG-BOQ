<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExportAucsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('export_aucs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->comment('id จาก project ไหน')->nullable();
            $table->foreignId('template_id')->comment('id จาก template ไหน')->nullable();
            $table->foreignId('boq_id')->comment('id จาก boq ไหน')->nullable();
            $table->foreignId('main_id')->comment('id จาก main ไหน')->nullable();
            $table->string('remark')->comment('all = งานหลักใน boq นั้นทั้งหมด, sub = เลือกเฉพาะงาน')->nullable();
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
        Schema::dropIfExists('export_aucs');
    }
}
