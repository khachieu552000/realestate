<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    use HasFactory;
    protected $table = 'user_info';
    protected $fillable = [
        'name',
        'gender',
        'birthday',
        'address',
        'phone',
        'account_id',
    ];

    public function account(){
        return $this->hasOne(Account::class, 'account_id');
    }
}
