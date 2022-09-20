<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boqs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('main_id')->comment('งานหลัก');
            $table->foreignId('sub_id')->comment('งานย่อย');
            $table->integer('amount')->comment('จำนวน');
            $table->foreignId('unit_id')->comment('หน่วย');
            $table->string('desc')->nullable()->comment('หมายเหตุ');
            $table->float('total', 8, 2)->default('0')->nullable()->comment('ยอดรวม');
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
        Schema::dropIfExists('boqs');
    }
}
