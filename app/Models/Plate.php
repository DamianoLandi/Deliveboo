<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plate extends Model
{

    protected $fillable = ['name', 'image', 'description', 'price', 'serving', 'restaurant_id', 'is_available'];


    public function restaurant()
    {
        return $this->belongsTo('App\Models\Restaurant');
    }

    public function orders()
    {
        return $this->belongsToMany('App\Models\Order')->withPivot('quantity');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Models\Category');
    }
}
