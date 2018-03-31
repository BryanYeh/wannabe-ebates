<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentStatus extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'name', 'slug'
    ];

    public function payments()
    {
        return $this->hasMany('App\Payment');
    }
}
