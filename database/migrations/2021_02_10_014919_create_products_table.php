<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->string('name', 120)->nullable();
            $table->string('slug', 130)->unique();
            $table->string('sumary', 200)->nullable();
            $table->text('content')->nullable();
            $table->string('img', 120)->nullable();
            $table->unsignedTinyInteger('tag_id')->default(0);
            $table->decimal('price', 10, 2)->nullable();
            $table->decimal('offer', 10, 2)->default(0);
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
        Schema::dropIfExists('products');
    }
}
