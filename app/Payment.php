<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'amount',
        'reference_id',
        'type',
        'user_id',
        'payment_status_id',
        'retailer_id',
        'trip_number'
    ];
}