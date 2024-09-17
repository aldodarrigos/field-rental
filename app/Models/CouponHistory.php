<?php

namespace App\Models;

use Codeboxr\CouponDiscount\Models\Coupon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CouponHistory extends Model
{
    use HasFactory;
    protected $table = 'coupon_histories';

    protected $fillable = [
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function coupon()
    {
        return $this->belongsTo(Coupon::class);
    }


    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'code', 'order_id');
    }
}
