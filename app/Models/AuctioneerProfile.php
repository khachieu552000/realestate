<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuctioneerProfile extends Model
{
    use HasFactory;
    protected $table = 'auctioneer_profile';
    protected $fillable = [
        'name', 'citizen_identification', 'phone', 'address',
    ];

    public function auction_history(){
        return $this->hasMany(AuctionHistory::class, 'auctioneer_id');
    }
}
