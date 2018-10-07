<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Retailer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'website',
        'tracking_link',
        'program_id',
        'description',
        'conditions',
        'tags',
        'seo_title',
        'meta_description',
        'meta_keyword',
        'slug',
        'expiration',
        'status',
        'affiliate_network_id',
        'store_of_week',
        'featured_store',
        'start_date',
        'end_date',
        'logo'
    ];

    public function cashbacks()
    {
        return $this->hasMany('App\Cashback')->latest();
    }

    public function banners()
    {
        return $this->hasMany('App\Banner');
    }

    public function coupons()
    {
        return $this->hasMany('App\Coupon');
    }

    public function activeCouponsCount()
    {
        return $this->hasMany('App\Coupon')->whereDate('start_date','<', Carbon::now())->whereDate('end_date','>', Carbon::now())->count();
    }

    public function payments()
    {
        return $this->hasMany('App\Payment');
    }

    public function affiliateNetwork()
    {
        return $this->belongsTo('App\AffiliateNetwork');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Category')->withTimestamps();
    }

    public function clicks()
    {
        return $this->morphMany('App\Click', 'clickable');
    }
}
