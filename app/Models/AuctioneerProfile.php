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

    public function auction_history()
    {
        return $this->hasMany(AuctionHistory::class, 'auctioneer_id');
    }

    public function createAuctionProfile($request, $property)
    {
        $auctioneer = new AuctioneerProfile();
        $auctioneer->name = $request->name;
        $auctioneer->citizen_identification = $request->citizen_identification;
        $auctioneer->phone = $request->phone;
        $auctioneer->address = $request->address;
        $auctioneer->save();

        $auction_history = new AuctionHistory();
        $auction_history->price = $request->price;
        $auction_history->property_id = $property->id;
        $auction_history->auctioneer_id = $auctioneer->id;
        $auction_history->save();
    }
}
