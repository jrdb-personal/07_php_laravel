<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

use App\Models\User;   
use App\Models\Profile;
use App\Models\Contact;
use App\Models\Address;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function home()
    {
        return view('home');
    }

    public function index()
    {
        return view('home');
    }

    public function viewprofile()
    {        
        $user = User::find(Auth::id());
        $gender = $this->getDropDownJson('gender.json');
        $nationality = $this->getDropDownJson('nationality.json');
        
        return view("profile", [
            'user' => $user,
            'gender' => $gender,
            'nationality' => $nationality,
        ]);
    }
    
    public function saveprofile(Request $request)
    {
        $validationrules = [
            'name' => 'required|unique:users|string|min:10|max:30',
            'birthdate' => 'required|date',
        ];
        
        $validationmessages = [
            'name.required' => ':attribute is required',
            'name.unique' => 'The value :input for :attribute already exists',
            'birthdate.required' => ':attribute is required',
            'birthdate.date' => ':attribute should be a valid date',
        ];

        //$profile = new Profile();
        $isValid = Validator::make(
            $request->all(),
            $validationrules,
            $validationmessages,
        );

        if ($isValid->fails()){
            //redirect to form
            return redirect('profile/view')->withErrors($isValid);
            return redirect()->route('profile.view');
            return redirect()->action('');
        }
        else {
            return response($request->all())
            ->header('Content-Type', 'application/pdf');

            return response()->json($request->all());
        }

        if (!$isValid->fails()){
            $photo_file = is_null($request->file('profile_image_new'))? null : $request->file('profile_image_new');
            $photo_name = is_null($photo_file)? 
            $request->profile_image_current : 
            Auth::id().'_'.$request->first_name.'_'.$request->last_name.'.'.$photo_file->getClientOriginalExtension();
            
            //using User relationship with Profile record
            if (is_null($request->id)){
                $profile = new Profile();
                $profile->user_id = Auth::id();
                $profile->first_name = $request->first_name;
                $profile->middle_name = $request->middle_name;
                $profile->last_name = $request->last_name;
                $profile->suffix = $request->suffix;
                $profile->birthdate = $request->birthdate;
                $profile->gender = $request->gender;
                $profile->nationality = $request->nationality;
                $profile->image = $photo_name;
                $profile->save();
            }
            else {
                $profile = User::find(Auth::id())->profile;
                $profile->user_id = $request->id;
                $profile->first_name = $request->first_name;
                $profile->middle_name = $request->middle_name;
                $profile->last_name = $request->last_name;
                $profile->suffix = $request->suffix;
                $profile->birthdate = $request->birthdate;
                $profile->gender = $request->gender;
                $profile->nationality = $request->nationality;
                $profile->image = $photo_name;
                $profile->save();

                Log::info($profile->first_name."'s profiles was succesfully saved.");
            }
            if ($photo_file){
                Storage::disk('local')->put($photo_name, $photo_file->get());
            }

            return redirect('profile/view')->withErrors($isValid);
        }

        else {
            return redirect('profile/view')->withErrors($isValid);    
        }
        //using url
        

        Log::emergency($message);
        Log::alert($message);
        Log::critical($message);
        Log::error($message);
        Log::warning($message);
        Log::notice($message);
        Log::info($message);
        Log::debug($message);
        
    }

    public function profile (Request $request)
    {
        //identify method from request object
        if ($request->method() == 'post'){
            $var = $request->only(['first_name', 'last_name']);
            varvar_dump($var);
            return $request->method(); 
        }
        else {
             //filter values coming from request object
            $var = $request->only(['first_name', 'last_name']);

            $var = $request->except(['birthdate', 'gender']);
 
            var_dump($var);
            return $request->method();

            if ($request->has(['first_name', 'gender']))
            {
                    
            }
        }
    }









    public function viewcontact()
    {
        $user = User::find(Auth::id());
        return view("contact", [
            'user' => $user,
        ]);
        
    }

    public function savecontact(Request $request)
    {
        $contact = new Contact();

        // if no current record, create new one
        if (is_null($request->id)){
            //using direct access to contact class
            $contact = new Contact();
            $contact->user_id = Auth::id();
            $contact->mobile = $request->mobile;
            $contact->landline = $request->landline;
            $contact->alternate_email = $request->alternate_email;
            $contact->save();
        }
        //else update
        else {
            $contact = Contact::where('user_id', Auth::id())->first();
            $contact->user_id = Auth::id();
            $contact->mobile = $request->mobile;
            $contact->landline = $request->landline;
            $contact->alternate_email = $request->alternate_email;
            $contact->save();            

        }
        return redirect()->route('contact.view');
    }
    
    public function listaddresses()
    {
        $addresses = Address::where('user_id', Auth::id())->paginate(5);
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
