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
        'exclusive',
        'status'
    ];
}
