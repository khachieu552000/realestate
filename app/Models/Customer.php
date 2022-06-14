<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customer';
    protected $fillable = [
        'name', 'email', 'phone', 'message', 'property_id',
    ];

    public function property(){
        return $this->belongsToMany(Property::class, 'property_id');
    }
}
