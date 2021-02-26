<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCategoryColumnToCrews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('crews', function (Blueprint $table) {
            $table->string('uniform_colors')->nullable()->after('img');
            $table->unsignedTinyInteger('category_id')->default(0)->after('uniform_colors');
            $table->unsignedTinyInteger('gender')->default(0)->after('category_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('crews', function (Blueprint $table) {
            $table->dropColumn('uniform_colors');
            $table->dropColumn('category_id');
            $table->dropColumn('gender');
        });
    }
}
