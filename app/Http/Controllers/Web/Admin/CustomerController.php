<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\AuctioneerProfile;
use App\Models\AuctionHistory;
use App\Models\Customer;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function listMember(){
        $list_member = Account::where('role', 'user')->get();
        return view('admin.customer.list-member', compact('list_member'));
    }

    public function listAuctioneer(){
        $list_auctioneer = AuctionHistory::with('auctioneer_profile')->with('property')->get();
        return view('admin.customer.list-auctioneer', compact('list_auctioneer'));
    }

    public function listCustomer(){
        $list_customer = Customer::all();
        return view('admin.customer.list-customer', compact('list_customer'));
    }
}
