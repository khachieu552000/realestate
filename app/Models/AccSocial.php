<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccSocial extends Model
{
    use HasFactory;
    protected $table = 'acc_social';
    protected $fillable = [
        'provider_user_id',
        'provider',
        'account_id',
    ];

    public function account(){
        return $this->belongsTo(Account::class, 'account_id');
    }
}
