<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Account extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = 'account';
    protected $fillable = [
        'email', 'password', 'role', 'status',
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    const ROLE_USER = 'user';

    public function property()
    {
        return $this->hasMany(Property::class, 'account_id');
    }

    public function user_info()
    {
        return $this->hasOne(UserInfo::class, 'account_id');
    }

    public function register($data)
    {

        $account = new Account();
        $account->email = $data['email'];
        $account->password = $data['password'];
        $account->role = self::ROLE_USER;
        $account->register_token = $data['register_token'];
        $account->save();

        $user = new UserInfo();
        $user->account_id = $account->id;
        $user->name = $data['name'];
        $user->gender = $data['gender'];
        $user->birthday = $data['birthday'];
        $user->address = $data['address'];
        $user->phone = $data['phone'];
        $user->save();
    }
}
