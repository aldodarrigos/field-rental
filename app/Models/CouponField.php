<?php

namespace App\Models;

use Codeboxr\CouponDiscount\Facades\Coupon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CouponField extends Model
{
    use HasFactory;
    protected $table = 'coupons_fields';

    protected $fillable = [
        'coupon_id',
        'field_id',
    ];

    public function coupon()
    {
        return $this->belongsTo(Coupon::class);
    }

    public function field()
    {
        return $this->belongsTo(Field::class);
    }

}
