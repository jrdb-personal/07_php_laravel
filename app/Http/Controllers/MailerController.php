<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Models\Profile;
use App\Mail\MailingService;

use Illuminate\Http\Request;

class MailerController extends Controller
{
    
    public function sendemail() {
        $datamessage = [
            'title' => "Test Title",
            'subject' => "Test subject",
            'message' => "Test message",
        ];
        
        Mail::to('test@gmail.com')
        ->cc('testcc@gmail.com')
        ->bcc('testbcc@gmail.com')
        ->send(new MailingService($datamessage));
        
    }

    public function sendregistration(){

    }

    public function sendupdaterecord(){

    }
}
