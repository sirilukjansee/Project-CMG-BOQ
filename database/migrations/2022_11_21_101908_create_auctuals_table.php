<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuctualsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auctuals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->comment('id จาก project ไหน')->nullable();
            $table->foreignId('template_id')->comment('id จาก template ไหน')->nullable();
            $table->foreignId('boq_id')->comment('id จาก boq ไหน')->nullable();
            $table->float('total', 10, 2)->nullable()->comment('ราคา');
            $table->string('remark')->nullable();
            $table->foreignId('create_by')->nullable();
            $table->foreignId('update_by')->nullable();
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
        Schema::dropIfExists('auctuals');
    }
}
