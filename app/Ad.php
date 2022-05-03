<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    protected $fillable = ['name', 'price', 'duration'];

    public function apartments() {
        return $this->belongsToMany('App\Apartment');
    }
}
