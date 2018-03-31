<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
        'end_date'
    ];

    public function cashbacks()
    {
        return $this->hasMany('App\Cashback');
    }

    public function banners()
    {
        return $this->hasMany('App\Banner');
    }

    public function coupons()
    {
        return $this->hasMany('App\Coupon');
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
}
