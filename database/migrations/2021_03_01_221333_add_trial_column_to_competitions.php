<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTrialColumnToCompetitions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('competitions', function (Blueprint $table) {
            $table->unsignedTinyInteger('trials')->default('0')->after('is_league');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('competitions', function (Blueprint $table) {
            $table->dropColumn('trials');
        });
    }
}
