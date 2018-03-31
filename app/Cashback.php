<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cashback extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'amount','type','retailer_id'
    ];

    public function reatiler()
    {
        return $this->belongsTo('App\Retailer');
    }
}
