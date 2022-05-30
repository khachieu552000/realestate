<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    use HasFactory;
    protected $table = 'ward';
    protected $fillable = [
        'name',
        'district_id',
    ];

    public function street(){
        return $this->hasMany(Street::class, 'ward_id');
    }

    public function district(){
        return $this->belongsTo(District::class, 'district_id');
    }
}
