<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;
    protected $table = 'account';

    public function property(){
        return $this->hasMany(Property::class, 'account_id');
    }

    public function user_info(){
        return $this->hasOne(UserInfo::class, 'account_id');
    }
}
