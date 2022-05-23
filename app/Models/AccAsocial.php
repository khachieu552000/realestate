<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccAsocial extends Model
{
    use HasFactory;
    protected $table = 'acc_social';

    public function account(){
        return $this->hasOne(Account::class, 'account_id');
    }
}
