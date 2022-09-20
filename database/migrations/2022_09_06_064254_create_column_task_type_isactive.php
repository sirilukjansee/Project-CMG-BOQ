<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColumnTaskTypeIsactive extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('task_types', function (Blueprint $table) {
            $table->enum('is_active', ['0', '1'])->default('1')->after('task_type_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('task_types', function (Blueprint $table) {
            $table->dropColumn('is_active');
        });
    }
}
