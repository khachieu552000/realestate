<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provincial extends Model
{
    use HasFactory;
    protected $table = 'provincial';

    public function district(){
        return $this->hasMany(District::class, 'provincial_id');
    }
}
