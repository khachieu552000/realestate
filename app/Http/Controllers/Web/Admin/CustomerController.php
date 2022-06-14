<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\AuctioneerProfile;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function listMember(){
        $list_member = Account::where('role', 'user')->get();
        return view('admin.customer.list-member', compact('list_member'));
    }

    public function listAuctioneer(){
        return view('admin.customer.list-auctioneer');
    }

    public function listCustomer(){
        return view('admin.customer.list-customer');
    }
}
