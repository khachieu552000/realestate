<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    const CATEGORY_PARENT = 0;
    protected $table = 'categories';
    protected $fillable = [
        'name', 'parent_id',
    ];

    public function property()
    {
        return $this->hasMany(Property::class, 'categories_id');
    }

    public function getData($parent_id = 1)
    {
        return Category::when($parent_id === self::CATEGORY_PARENT, function ($query) use ($parent_id) {
            $query->where('id', $parent_id);
        });
    }
}
