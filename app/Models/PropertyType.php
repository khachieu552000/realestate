<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyType extends Model
{
    use HasFactory;
    protected $table = 'property_type';
    protected $fillable = [
        'name', 'status'
    ];

    public function property(){
        return $this->hasMany(Property::class,'property_type_id');
    }
}
