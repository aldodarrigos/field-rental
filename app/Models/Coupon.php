<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    protected $table = 'coupons';

    protected $fillable = [
        'range_dates_reservation',
    ];

    public function fields()
    {
        return $this->hasMany(CouponField::class);
    }

    public function reservation_dates()
    {
        return $this->hasMany(CouponReservationDate::class);
    }
}
