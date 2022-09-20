<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColumnBoqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('boqs', function (Blueprint $table) {
            $table->enum('status', ['0', '1','2','3','4'])->default('0')->after('total')->comment('สถานะของ boq')->nullable();
            $table->string('comment')->after('status')->comment('คอมเมนท์จากหัวหน้า')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('boqs', function (Blueprint $table) {
            $table->dropColumn('status','comment');
        });
    }
}
