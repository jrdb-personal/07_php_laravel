<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;


use App\Models\Contact;
use App\Models\Address;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        session(['user_id' => Auth::id()]);
        return view('home');
    }

    public function home(Request $request)
    {
        return view('home');
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

 
}
