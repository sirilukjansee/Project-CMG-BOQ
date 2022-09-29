<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColumnUsersAdd1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->enum('permision', ['0','1','2'])->default('0')->after('password')->comment('สิทการใช้งาน');
            $table->enum('status', ['0', '1'])->default('1')->after('permision')->comment('ststus');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users=', function (Blueprint $table) {
            $table->dropColumn('permision','status');
        });
    }
}
