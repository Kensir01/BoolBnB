<?php

namespace App\UR;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{

    protected $fillable = ['title', 'rooms_number', 'beds_number', 'bathrooms_number', 'square_meters', 'latitude', 'longitude', 'image', 'visibility', 'city', 'address', 'zip_code', 'user_id'];

    public function user() {
        return $this->belongsTo('App\User');
    }
    
}
