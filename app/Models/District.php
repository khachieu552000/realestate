<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;
    protected $table = 'district';
    protected $fillable = [
        'name',
        'provinces_id',
    ];

    public function provinces(){
        return $this->belongsTo(Provinces::class, 'provinces_id');
    }

    public function ward(){
        return $this->hasMany(Ward::class, 'district_id');
    }
}
