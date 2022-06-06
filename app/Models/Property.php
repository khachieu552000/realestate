<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\FuncCall;

class Property extends Model
{
    use HasFactory;
    protected $table = 'property';
    protected $fillable = [
        'name',
        'investor',
        'address',
        'image',
        'description',
        'price',
        'acreage',
        'floors',
        'bedrooms',
        'bathrooms',
        'juridical',
        'start_date',
        'end_date',
        'property_type_id',
        'direction_id',
        'account_id',
        'categories_id',
        'street_id',
        'post_type_id',
        'status',
    ];

    public function directions(){
        return $this->belongsTo(Directions::class, 'direction_id');
    }

    public function juridical(){
        return $this->belongsTo(Juridical::class, 'juridical_id');
    }

    public function account(){
        return $this->belongsTo(Account::class, 'account_id');
    }

    public function categories(){
        return $this->belongsTo(Category::class, 'categories_id');
    }

    public function street(){
        return $this->belongsTo(Street::class, 'street_id');
    }

    public function post_type(){
        return $this->belongsTo(PostType::class, 'post_type_id');
    }

    public function property_type(){
        return $this->belongsTo(PropertyType::class, 'property_type_id');
    }
}
