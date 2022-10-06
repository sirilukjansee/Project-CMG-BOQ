<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemplateBoqTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('template_boqs', function (Blueprint $table) {
            $table->id();
            $table->string('number_id');
            $table->foreignId('project_id')->comment('รหัสโครงการ');
            $table->string('name');
            $table->date('date')->format('d.m.Y');
            $table->foreignId('vender_id')->nullable();
            $table->enum('status', ['0', '1','2','3','4'])->default('0')->comment('สถานะของ boq drafted,waiting approval,approval,reject,rework');
            $table->foreignId('create_by');
            $table->foreignId('update_by');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('template_boqs');
    }
}
