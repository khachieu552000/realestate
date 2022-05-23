<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Street extends Model
{
    use HasFactory;
    protected $table = 'street';

    public function property(){
        return $this->hasMany(Property::class, 'street_id');
    }

    public function ward(){
        return $this->belongsTo(Ward::class, 'ward_id');
    }
}
