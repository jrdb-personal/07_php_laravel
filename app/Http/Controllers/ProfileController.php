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

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function viewprofile()
    {      
        $user = User::find(session('user_id'));
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
        $profile = new Profile();
        $isValid = Validator::make(
            $request->all(),
            $profile->validationrules,
            $profile->validationmessages,
        );


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
                $profile->birth_date = $request->birth_date;
                $profile->gender = $request->gender;
                $profile->nationality = $request->nationality;
                $profile->photo = $photo_name;
                $profile->save();
                //$profile = Profile::create([]);

                Log::info($profile->first_name."'s profiles was succesfully created.");
                Log::channel('slack')->info('Something happened!');
            }

            else {
                $profile = User::find(Auth::id())->profile;
                $profile = Profile::find($request->id);
                $profile->user_id = Auth::id();
                $profile->first_name = $request->first_name;
                $profile->middle_name = $request->middle_name;
                $profile->last_name = $request->last_name;
                $profile->suffix = $request->suffix;
                $profile->birth_date = $request->birth_date;
                $profile->gender = $request->gender;
                $profile->nationality = $request->nationality;
                $profile->photo = $photo_name;
                $profile->save();
               
                Log::info($profile->first_name."'s profiles was succesfully updated.");
            }
            if ($photo_file){
                Storage::disk('local')->put($photo_name, $photo_file->get());
            }

            Log::info("User input invalid");
            return redirect('profile/view')->withErrors($isValid);
        }

        else {
            return redirect('profile/view')->withErrors($isValid);    
        }
        //using url

        
        
        /*
        Log::emergency($message);
        Log::alert($message);
        Log::critical($message);
        Log::error($message);
        Log::warning($message);
        Log::notice($message);
        Log::info($message);
        Log::debug($message);
        */
        
    }
    public function getDropDownJson($file_name)
    {
        $lists = Storage::disk('json')->exists($file_name)? 
        Storage::disk('json')->get($file_name) : '';
        return json_decode($lists, true);
    }
}
