<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMemberToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {

            $table->string('ide', 25)->nullable()->after('role');
            $table->date('born')->nullable()->after('ide');
            $table->string('address', 100)->nullable()->after('born');
            $table->string('phone', 30)->nullable()->after('address');
            $table->unsignedTinyInteger('member')->default(0)->after('phone');
            $table->date('member_start')->nullable()->after('member');
            $table->date('member_finish')->nullable()->after('member_start');
            $table->unsignedTinyInteger('status')->default(1)->after('member_finish');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {

            $table->dropColumn('ide');
            $table->dropColumn('born');
            $table->dropColumn('address');
            $table->dropColumn('phone');
            $table->dropColumn('member');
            $table->dropColumn('member_start');
            $table->dropColumn('member_finish');
            
        });
    }
}
