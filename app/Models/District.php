<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;
    protected $table = 'district';
    
    public function provincial(){
        return $this->belongsTo(Provincial::class, 'provincial_id');
    }

    public function ward(){
        return $this->hasMany(Ward::class, 'district_id');
    }
}
