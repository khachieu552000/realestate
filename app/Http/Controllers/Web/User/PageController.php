<?php

namespace App\Http\Controllers\Web\User;

use App\Http\Controllers\Controller;
use App\Models\AuctioneerProfile;
use App\Models\AuctionHistory;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Property;
use App\Models\PropertyType;
use App\Models\Provinces;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function Home()
    {
        $date = Carbon::now()->toDateString();
        $property_type = PropertyType::where('status', 1)->get();
        // search
        $provinces = Provinces::all();
        $category = Category::all();
        $property_type = PropertyType::all();

        if (!empty($property_type[0])) {
            foreach ($property_type as $pt) {
                $property = Property::where('status', '!=', 'deactive')->where('property_type_id', '!=', $pt->id)
                    ->where('end_date', '>=', $date)->paginate(5, ['*'], 'pag');
            }
            return view('user.index', compact('property', 'provinces', 'category', 'property_type'));
        } else {
            $property = Property::where('status', '!=', 'deactive')
                ->where('end_date', '>=', $date)->paginate(5, ['*'], 'pag');
            return view('user.index', compact('property'));
        }
    }

    public function showContact()
    {
        return view('user.contact');
    }

    public function showAbout()
    {
        return view('user.about');
    }

    public function showProperty($id_category)
    {
        $category_find_id = Category::find($id_category);
        $provinces = Provinces::all();
        $category = Category::all();
        $property_type = PropertyType::all();
        $date = Carbon::now()->toDateString();
        $property_type = PropertyType::where('status', 1)->get();

        if (!empty($property_type[0])) {
            foreach ($property_type as $pt) {
                $property = Property::where('categories_id', $id_category)
                    ->where('status', '!=', 'deactive')->where('property_type_id', '!=', $pt->id)
                    ->where('end_date', '>=', $date)->paginate(8, ['*'], 'pag');
                return view('user.list-property', compact('property', 'category_find_id', 'provinces', 'category', 'property_type'));
            }
        } else {
            $property = Property::where('categories_id', $id_category)
                ->where('status', '!=', 'deactive')
                ->where('end_date', '>=', $date)->paginate(8, ['*'], 'pag');
            return view('user.list-property', compact('property', 'category_find_id', 'provinces', 'category', 'property_type'));
        }
    }

    public function showAuction($id_property_type)
    {
        $date = Carbon::now()->toDateString();
        $provinces = Provinces::all();
        $category = Category::all();
        $property_type = PropertyType::all();
        $property = Property::where('property_type_id', $id_property_type)
            ->where('status', 'active')
            ->get();
        foreach ($property as $pr) {
            $max_price = AuctionHistory::with('auctioneer_profile')
                ->orderBy('price', 'desc')
                ->orderBy('updated_at', 'asc')
                ->find($pr->id);
            // dd($max_price);
            return view('user.list-auction', compact('property', 'max_price', 'date', 'provinces', 'category', 'property_type'));
        }

        // dd($max_price->auctioneer_profile->name);
        // $property = Property::where('property_type_id', $id_property_type)
        //     ->where('status', 'active')
        //     ->get();

    }

    public function showAuctionProperty($id_property)
    {
        $property = Property::find($id_property);
        return response()->json(['data' => $property], 200);
    }

    public function auctionProperty(Request $request, $id_property)
    {
        $property = Property::find($id_property);
        $history = AuctionHistory::all();
        foreach ($history as $history) {
        }
        if ($property->id === $history->property_id) {
            $auctioneer = AuctionHistory::with('auctioneer_profile')->where('property_id', $id_property)->get();
            if (isset($auctioneer)) {
                foreach ($auctioneer as $item) {
                    // dd($item->auctioneer_profile->citizen_identification);
                    if (strcmp($item->auctioneer_profile->citizen_identification, $request->citizen_identification) === 0) {
                        $auctioneer = AuctioneerProfile::where('citizen_identification', $request->citizen_identification)->first();
                        $auction_history = AuctionHistory::where('auctioneer_id', $auctioneer->id)->first();
                        // dd($auction_history);
                        // // dd($auctioneer->auctioneer_history);
                        $auction_history->price = $request->price;
                        $auction_history->update();
                        return redirect()->back()->with('message', 'Bạn đã thay đổi mức giá của mình');
                    } else {
                        $property = Property::find($id_property);
                        AuctioneerProfile::createAuctionProfile($request, $property);
                        return redirect()->back()->with('message', 'Chúc mừng bạn đã tham gia đấu giá đấu giá thành công');
                    }
                }
            } else {
                $property = Property::find($id_property);
                AuctioneerProfile::createAuctionProfile($request, $property);
                return redirect()->back()->with('message', 'Chúc mừng bạn đã tham gia đấu giá đấu giá thành công');
            }
        } else {
            $property = Property::find($id_property);
            AuctioneerProfile::createAuctionProfile($request, $property);
            return redirect()->back()->with('message', 'Chúc mừng bạn đã tham gia đấu giá đấu giá thành công');
        }
    }

    public function showPropertyDetail($id_property)
    {
        $date = Carbon::now()->toDateString();
        $property = Property::find($id_property);
        $similar_property = Property::where('property_type_id', $property->property_type_id)->get();
        $max_price = AuctionHistory::with('auctioneer_profile')->where('property_id', $id_property)
            ->orderBy('price', 'desc')
            ->orderBy('updated_at', 'asc')
            ->first();
        return view('user.property-detail', compact('property', 'max_price', 'date', 'similar_property'));
    }

    public function showCustomerContact($id_property)
    {
        $property = Property::find($id_property);
        return response()->json(['data' => $property], 200);
    }

    public function customerContact(Request $request, $id_property)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'message' => 'required',
        ], [
            'name.required' => 'Vui lòng nhập họ tên',
            'email.required' => 'Vui lòng nhập email',
            'phone.required' => 'Vui lòng nhập số điện thoại',
            'message.required' => 'Vui lòng nhập lời nhắn',
        ]);
        $property = Property::find($id_property);
        $contact_customer = new Customer();
        $contact_customer->name = $request->name;
        $contact_customer->email = $request->email;
        $contact_customer->phone = $request->phone;
        $contact_customer->message = $request->message;
        $contact_customer->property_id = $property->id;
        $contact_customer->save();
        return redirect()->back()->with('message', 'Đã gửi yêu cầu liên hệ');
    }

}
