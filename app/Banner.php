<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'image',
        'link',
        'title',
        'start_date',
        'end_date',
        'width',
        'height'
    ];
}
