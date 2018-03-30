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
        'type_id',
        'type',
        'user_id'
    ];
}
