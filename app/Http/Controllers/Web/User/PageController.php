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
use App\Http\Controllers\Web\User\SearchTrait;
use Illuminate\Support\Facades\Log;
class PageController extends Controller
{
    use SearchTrait;
    public function Home()
    {
        $provinces = Provinces::all();
        $category = Category::all();
        $property_type_all = PropertyType::all();

        $date = Carbon::now()->toDateString();
        $property_type = PropertyType::where('status', 1)->first();
        if (!empty($property_type)) {
            $property = Property::getProperty($date)
                ->where('property_type_id', '!=', $property_type->id)
                ->paginate(5, ['*'], 'pag');
            return view(
                'user.index',
                compact('property', 'provinces', 'category', 'property_type', 'property_type_all')
            );
        } else {
            $property = Property::getProperty($date)->paginate(5, ['*'], 'pag');
            return view(
                'user.index',
                compact('property', 'provinces', 'category', 'property_type', 'property_type_all')
            );
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
        $property_type_all = PropertyType::all();

        $date = Carbon::now()->toDateString();
        $property_type = PropertyType::where('status', 1)->first();

        if (!empty($property_type)) {
            $property = Property::propertyByCategory($id_category, $date)
                ->where('property_type_id', '!=', $property_type->id)
                ->paginate(8, ['*'], 'pag');
            return view(
                'user.list-property',
                compact('property', 'category_find_id', 'provinces', 'category', 'property_type', 'property_type_all')
            );
        } else {
            $property = Property::propertyByCategory($id_category, $date)->paginate(8, ['*'], 'pag');
            return view(
                'user.list-property',
                compact('property', 'category_find_id', 'provinces', 'category', 'property_type', 'property_type_all')
            );
        }
    }

    public function showAuction($id_property_type)
    {
        //search
        $provinces = Provinces::all();
        $category = Category::all();
        $property_type_all = PropertyType::all();

        $date = Carbon::now()->toDateString();
        $property = Property::with('auction_history.auctioneer_profile')
            ->where('property_type_id', $id_property_type)
            ->where('status', 'active')
            ->get();
        $arr_max = [];
        foreach ($property as $pr) {
            $max = 0;
            foreach ($pr->auction_history as $auc) {
                if ($auc->price > $max) {
                    $max = $auc->price;
                    $arr_max[$pr->id] = [$auc];
                }
            };
        }
        // dd($arr_max[$pr->id][0]);
        return view(
            'user.list-auction',
            compact('property', 'arr_max', 'date', 'provinces', 'category', 'property_type_all')
        );
    }

    public function showAuctionProperty($id_property)
    {
        $property = Property::find($id_property);
        return response()->json(['data' => $property], 200);
    }

    public function auctionProperty(Request $request, $id_property)
    {

        $this->validate($request, [
            'name' => 'required',
            'citizen_identification' => 'required|min:9|max:12',
            'phone' => 'required|min:10|max:12',
            'address' => 'required',
            'price' => 'required',
        ], [
            'name.required' => 'Bạn vui lòng nhập họ tên',
            'citizen_identification.required' => 'Bạn vui lòng nhập CCCD/CMND',
            'citizen_identification.min' => 'Vui lòng nhập ít nhất 9 số',
            'citizen_identification.max' => 'CMND/CCCD không được quá 12 số',
            'phone.required' => 'Bạn vui lòng nhập số điện thoại',
            'phone.min' => 'Bạn vui lòng nhập ít nhất 10 số',
            'phone.max' => 'Bạn vui lòng nhập không quá 12 số',
            'address.required' => 'Bạn vui lòng nhập địa chỉ',
            'price.required' => 'Bạn vui lòng nhập số tiền tham gia',
        ]);

        $property = Property::find($id_property);
        $history = AuctionHistory::with('auctioneer_profile')->where('property_id', $id_property)->get();
        if(isset($history[0])){
            for ($i = 0; $i <= count($history); $i++) {
                // dd($history[0]->auctioneer_profile);
                if (strcmp($history[$i]->auctioneer_profile->citizen_identification, $request->citizen_identification) === 0) {
                    // $auctioneer = AuctioneerProfile::where('citizen_identification', $request->citizen_identification)->get();
                    // for($j = 0; $j < count($auctioneer); $j++){
                        // $auction_history = AuctionHistory::where('auctioneer_id', $auctioneer[$j]->id)->where('property_id', $id_property)->first();
                        $history[$i]->price = $request->price;
                        $history[$i]->update();
                    // }
                    return redirect()->back()->with('message', 'Bạn đã thay đổi mức giá của mình');
                }
                else {
                $property = Property::find($id_property);
                AuctioneerProfile::createAuctionProfile($request, $property);
                return redirect()->back()->with('message', 'Chúc mừng bạn đã tham gia đấu giá đấu giá thành công');
            }
        }
    }
        else {
            $property = Property::find($id_property);
            AuctioneerProfile::createAuctionProfile($request, $property);
            return redirect()->back()->with('message', 'Chúc mừng bạn đã tham gia đấu giá đấu giá thành công');
        }
    }
        // // $property = Property::find($id_property);
        // // $history = AuctionHistory::all();
        // dd($history);
    //     if(isset($history[0])){
    //         for ($i = 0; $i <= count($history); $i++) {
    //             if ($property->id === $history[$i]->property_id) {
    //                 // dd($history[$i]);
    //                 $auctioneer_history = AuctionHistory::with('auctioneer_profile')->where('property_id', $id_property)->get();
    //                 if (isset($auctioneer_history)) {
    //                     foreach ($auctioneer_history as $item) {
    //                         if (strcmp($item->auctioneer_profile->citizen_identification, $request->citizen_identification) === 0) {
    //                             $auctioneer = AuctioneerProfile::where('citizen_identification', $request->citizen_identification)->first();
    //                             $auction_history = AuctionHistory::where('auctioneer_id', $auctioneer->id)->where('property_id', $id_property)->first();
    //                             $auction_history->price = $request->price;
    //                             $auction_history->update();
    //                             return redirect()->back()->with('message', 'Bạn đã thay đổi mức giá của mình');
    //                         } else {
    //                             $property = Property::find($id_property);
    //                             AuctioneerProfile::createAuctionProfile($request, $property);
    //                             return redirect()->back()->with('message', 'Chúc mừng bạn đã tham gia đấu giá đấu giá thành công');
    //                         }
    //                     }
    //                 } else {
    //                     $property = Property::find($id_property);
    //                     AuctioneerProfile::createAuctionProfile($request, $property);
    //                     return redirect()->back()->with('message', 'Chúc mừng bạn đã tham gia đấu giá đấu giá thành công');
    //                 }
    //             } else {
    //                 $property = Property::find($id_property);
    //                 AuctioneerProfile::createAuctionProfile($request, $property);
    //                 return redirect()->back()->with('message', 'Chúc mừng bạn đã tham gia đấu giá đấu giá thành công');
    //             }
    //         }
    //     }
    //     else{
    //         $property = Property::find($id_property);
    //             AuctioneerProfile::createAuctionProfile($request, $property);
    //             return redirect()->back()->with('message', 'Chúc mừng bạn đã tham gia đấu giá đấu giá thành công');
    //     }
    // }


    public function showPropertyDetail($id_property)
    {
        $date = Carbon::now()->toDateString();
        $property = Property::find($id_property);
        $similar_property = Property::where('property_type_id', $property->property_type_id)->get();
        $max_price = AuctionHistory::with('auctioneer_profile')
            ->where('property_id', $id_property)
            ->orderBy('price', 'desc')
            ->orderBy('updated_at', 'asc')
            ->first();
        return view(
            'user.property-detail',
            compact('property', 'max_price', 'date', 'similar_property')
        );
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
            'email' => 'required|email',
            'phone' => 'required|numeric|min:10|max:12',
            'message' => 'required',
        ], [
            'name.required' => 'Vui lòng nhập họ tên',
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Nhập email không đúng định dạng',
            'phone.required' => 'Vui lòng nhập số điện thoại',
            'phone.numeric' => 'Bạn vui lòng nhập số',
            'phone.min' => 'Bạn vui lòng nhập ít nhất 10 số',
            'phone.max' => 'Bạn vui lòng nhập không quá 12 số',
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

    public function search(Request $request)
    {
        $provinces = Provinces::all();
        $category = Category::all();
        $property_type_all = PropertyType::all();
        $keyword = $this->searchs($request);
        log::channel('user')->info($keyword);
        return view('user.list-property-search', compact('keyword', 'provinces','category', 'property_type_all'));
    }
}
