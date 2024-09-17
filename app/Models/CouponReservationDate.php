<?php

namespace App\Models;

use Codeboxr\CouponDiscount\Facades\Coupon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CouponReservationDate extends Model
{
    use HasFactory;

    protected $table = 'coupons_reservation_dates';

    protected $fillable = [
        'coupon_id',
        'date',
    ];

    public function coupon()
    {
        return $this->belongsTo(Coupon::class);
    }

}
