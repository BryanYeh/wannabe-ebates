<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Click extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'trip_number',
        'clickable_id',
        'clickable_type',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function clickable()
    {
        return $this->morphTo();
    }
}
