<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Directions extends Model
{
    use HasFactory;
    protected $table = 'directions';

    public function property(){
        $this->hasMany(Property::class, 'direction_id');
    }
}
