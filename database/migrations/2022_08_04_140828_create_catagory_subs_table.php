<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatagorySubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catagory_subs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('catagory_id')->comment('รหัสงานหลัก');
            $table->string('name')->nullable('ชื่องานย่อย');
            $table->enum('is_active',['0','1'])->default('1')->comment('0 = InActive, 1 = Active');
            $table->foreignId('create_by')->nullable();
            $table->foreignId('update_by')->nullable();
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
        Schema::dropIfExists('catagory_subs');
    }
}
