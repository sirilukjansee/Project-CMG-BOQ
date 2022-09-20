<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColumnTemplateBoqsAdd1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('template_boqs', function (Blueprint $table) {
            $table->text('comment')->after('status')->comment('คอมเมนท์จากหัวหน้า')->nullable();
            $table->foreignId('approve_by')->after('comment')->comment('อนุมัติโดย...')->nullable();
            $table->dateTime('approve_at')->after('approve_by')->comment('เวลาอนุมัติ')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('template_boqs', function (Blueprint $table) {
            $table->dropColumn('comment','approve_by','approve_at');
        });
    }
}
