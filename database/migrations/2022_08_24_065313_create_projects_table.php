<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('brand');
            $table->foreignId('concept');
            $table->foreignId('location');
            $table->float('area', 4, 2)->nullable();
            $table->string('unit')->nullable();
            $table->integer('io')->nullable();
            $table->foreignId('task')->nullable();
            $table->foreignId('task_n')->nullable();
            $table->date('start_date')->nullable();
            $table->date('finish_date')->nullable();
            $table->integer('all_date')->nullable();
            $table->date('open_date')->nullable();
            $table->foreignId('designer_name')->nullable();
            $table->string('project_manager')->nullable();
            $table->float('total', 8, 2)->default('0')->nullable()->comment('ยอดรวม');
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
        Schema::dropIfExists('projects');
    }
}
