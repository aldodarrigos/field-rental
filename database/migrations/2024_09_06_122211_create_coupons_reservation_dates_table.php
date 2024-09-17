<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsReservationDatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons_reservation_dates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('coupon_id');
            // $table->unsignedBigInteger('field_id');
            // $table->longText('hours');
            $table->date('date');
            $table->timestamps();

            // // Foreign key constraints
            // $table->foreign('coupon_id')->references('id')->on('coupons')->onDelete('cascade');
            // $table->foreign('field_id')->references('id')->on('fields')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coupons_reservation_dates');
    }
}
