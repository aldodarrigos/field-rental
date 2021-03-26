<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSummerclinicTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('summerclinic', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->string('name', 100)->nullable('false');
            $table->string('slug', 120)->nullable();
            $table->string('sumary', 160)->nullable();
            $table->text('content')->nullable();
            $table->string('img', 120)->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->decimal('price_alt', 10, 2)->nullable();
            $table->unsignedTinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('summerclinic');
    }
}
