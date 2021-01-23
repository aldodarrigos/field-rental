<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImgMobToSlides extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('slides', function (Blueprint $table) {
            $table->string('img_mob', 120)->nullable()->after('img');
            $table->unsignedTinyInteger('shadow')->default(1)->after('sort');
            $table->unsignedTinyInteger('bottom')->default(0)->after('shadow');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('slides', function (Blueprint $table) {
            $table->dropColumn('img_mob');
            $table->dropColumn('shadow');
            $table->dropColumn('bottom');
        });
    }
}
