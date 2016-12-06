<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\sendMail;
use Mail;

class Mailler extends Controller
{
    public function send($email="zupiterhd@gmail.com"){
    	Mail::to($email)->send(new sendMail);
    	return redirect()->back();
    }
}
