<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use App\Models\User;   
use App\Models\Address;

class AddressController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function listaddress()
    {
        $addresses = Address::where('user_id', Auth::id())->simplePaginate(5);
        return view('addresslist', [
            'addresses' => $addresses,
        ]);
    }

    public function viewaddresses(Request $request)
    {
        $geolocation = $this->getDropDownJson('ph_geolocation.json');
        
        if (is_null($request->id)){
            $address = new Address();
            return view('address', [
                'address' => $address,
                'geolocation' => $geolocation,
            ]);
        }
        else{
            $address = Address::find($request->id);
            return view('address', [
                'address' => $address,
                'geolocation' => $geolocation,
            ]);
        }
    }

    public function saveaddresses(Request $request)
    {
        if (is_null($request->id)){
            $address = new Address();
            $address->user_id = Auth::id();
            $address->address_type = $request->address_type;
            $address->address = $request->address;
            $address->municipality = $request->municipality;
            $address->region = $request->region;
            $address->zip_code = $request->zip_code;
            $address->save();
        }
        else {
            $address = Address::find($request->id);
            $address->user_id = Auth::id();
            $address->address_type = $request->address_type;
            $address->address = $request->address;
            $address->municipality = $request->municipality;
            $address->region = $request->region;
            $address->zip_code = $request->zip_code;
            $address->save();
        }
        return redirect()->route('addresses.list');
    }

    public function getDropDownJson($file_name)
    {
        $lists = Storage::disk('json')->exists($file_name)? 
        Storage::disk('json')->get($file_name) : '';
        return json_decode($lists, true);
    }
}
