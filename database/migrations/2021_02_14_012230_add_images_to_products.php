<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImagesToProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('img_2', 120)->nullable()->after('img');
            $table->string('img_3', 120)->nullable()->after('img_2');
            $table->string('img_4', 120)->nullable()->after('img_3');
            $table->string('img_5', 120)->nullable()->after('img_4');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('img_2');
            $table->dropColumn('img_3');
            $table->dropColumn('img_4');
            $table->dropColumn('img_5');

        });
    }
}
