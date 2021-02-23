<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->unsignedMediumInteger('user_id')->nullable('false');
            $table->unsignedMediumInteger('product_id')->nullable('false');
            $table->char('size', 5)->nullable();
            $table->unsignedTinyInteger('quantity')->default(1);
            $table->decimal('price_unit', 10, 2)->nullable();
            $table->decimal('final_price', 10, 2)->nullable();
            $table->string('payment_code', 50)->nullable();
            $table->string('code', 50)->nullable();
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
        Schema::dropIfExists('sales');
    }
}
