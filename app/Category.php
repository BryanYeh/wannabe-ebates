<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'parent',
        'title',
        'slug',
        'description',
        'meta_description',
        'meta_keyword',
        'status',
        'position'
    ];

    public function retailers()
    {
        return $this->belongsToMany('App\Retailer')->withTimestamps();
    }

    public function children(){
        return $this->hasMany( 'App\Category', 'id','parent');
    }

    public function parent()
    {
        return ($this->parent == 0) ? "none" : $this->belongsTo( 'App\Category', 'parent' )->first();
    }
    
}
