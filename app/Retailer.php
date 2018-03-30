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
}
