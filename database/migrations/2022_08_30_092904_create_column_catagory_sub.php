<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColumnCatagorySub extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('catagory_subs', function (Blueprint $table) {
            $table->string('code')->after('id')->nullable();
            $table->string('code_criteria', 2)->after('code')->nullable();
            $table->string('brand_id')->after('name')->nullable();
            $table->string('code_cat')->after('brand_id')->comment('Code ของตาราง Catagory')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('catagory_subs', function (Blueprint $table) {
            $table->dropColumn('code');
            $table->dropColumn('brand_id');
        });
    }
}
