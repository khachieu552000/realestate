<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Juridical extends Model
{
    use HasFactory;
    protected $table = 'juridical';

    public function property(){
        return $this-> hasMany(Property::class, 'juridical_id');
    }
}
