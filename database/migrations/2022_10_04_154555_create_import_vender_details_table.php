<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImportVenderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('import_vender_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('import_id')->comment('id จาก import ไหน')->nullable();
            $table->foreignId('main_id')->comment('id จาก งานหลัก ไหน')->nullable();
            $table->foreignId('sub_id')->comment('id จาก งานย่อย ไหน')->nullable();
            $table->integer('amount')->comment('จำนวน')->nullable();
            $table->foreignId('unit_id')->comment('id จาก หน่วย ไหน')->nullable();
            $table->string('desc')->comment('comment')->nullable();
            $table->float('wage_cost', 8, 2)->nullable()->comment('ค่าแรง');
            $table->float('material_cost', 8, 2)->nullable()->comment('ค่าวัสดุ');
            $table->float('each_unit', 8, 2)->nullable()->comment('ยอดรวมต่อหน่วย');
            $table->float('all_unit', 8, 2)->nullable()->comment('ยอดรวมทั้งหมด');
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
        Schema::dropIfExists('import_vender_details');
    }
}
