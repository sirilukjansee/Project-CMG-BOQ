<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogRemarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_remarks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->comment('id project')->nullable();
            $table->foreignId('template_id')->comment('id template')->nullable();
            $table->enum('status', ['0', '1','2','3','4'])->comment('สถานะของ boq drafted,waiting approval,approval,reject,rework')->nullable();
            $table->foreignId('approve_by')->comment('อนุมัติโดย...')->nullable();
            $table->dateTime('date')->comment('เวลาอนุมัติ')->nullable();
            $table->text('comment')->nullable();
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
        Schema::dropIfExists('log_remarks');
    }
}
