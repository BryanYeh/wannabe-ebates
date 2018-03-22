<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AffiliateNetwork extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','website','logo','status','subid'
    ];
}
