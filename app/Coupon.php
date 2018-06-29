<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'title',
        'code',
        'link',
        'description',
        'start_date',
        'end_date',
        'coupon_type_id',
        'retailer_id',
        'exclusive',
        'status'
    ];

    protected $dates = ['start_date','end_date'];

    public function couponTypes()
    {
        return $this->belongsTo('App\CouponType');
    }

    public function retailer()
    {
        return $this->belongsTo('App\Retailer');
    }
}
