<?php

//Tang Ming Yi

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\MailNotify;
use Illuminate\Support\Facades\Mail;
class MailController extends Controller
{
     public function view_send_email_page(){
         return view('layouts\send_mail',[]);
        
     }
  public function sendEmail(Request $request){
        
        $title=$request->title;
        $content=$request->content;
        $email_address=$request->email_address;
        Mail::to($email_address)->send(new MailNotify($title, $content));

        return redirect()->back();
    }
}