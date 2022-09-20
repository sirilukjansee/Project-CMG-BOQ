<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterTORSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_t_o_r_s', function (Blueprint $table) {
            $table->id();
            $table->string('message')->nullable()->comment('ข้อกำหนด');
            $table->enum('is_active', ['0', '1'])->default('1');
            $table->text('remark')->nullable();
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
        Schema::dropIfExists('master_t_o_r_s');
    }
}
