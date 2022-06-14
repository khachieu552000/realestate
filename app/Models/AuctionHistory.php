<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuctionHistory extends Model
{
    use HasFactory;
    protected $table = 'auction_history';
    protected $fillable = [
        'price', 'property_id', 'auctioneer_id',
    ];

    public function auctioneer_profile(){
        return $this->belongsTo(AuctioneerProfile::class,'auctioneer_id');
    }

    public function property(){
        return $this->belongsTo(Property::class, 'property_id');
    }
}
