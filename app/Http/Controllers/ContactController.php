<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use App\Models\User;   
use App\Models\Contact;

class ContactController extends Controller
{    
    public function __construct()
    {
        $this->middleware('auth');
    }
        
    public function listcontact()
    {
        $contacts = Contact::where('user_id', Auth::id())->simplePaginate(5);
        return view('contactlist', [
            'contacts' => $contacts,
        ]);
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
}
