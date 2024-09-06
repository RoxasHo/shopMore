<?php

//Ho Kian Hou

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CaptchaController extends Controller
{
    public function reloadCaptcha(){
        return response()->json(['captcha'=>captcha_img('flat')]);
    }
    
    public function post(Request $request){
        $request->validate([
            'captcha'=> 'required|captcha',
        ]);
        return;
    }

}
