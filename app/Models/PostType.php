<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostType extends Model
{
    use HasFactory;
    protected $table = 'post_type';
    protected $fillable = [
        'name',
        'price',
        'start_date',
        'end_date',
    ];

    public function property(){
        return $this->hasMany(Property::class, 'post_type_id');
    }
}
