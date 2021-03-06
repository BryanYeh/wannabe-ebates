<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CouponType extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'name', 'slug'
    ];

    public function coupons()
    {
        return $this->hasMany('App\Coupon');
    }
}
