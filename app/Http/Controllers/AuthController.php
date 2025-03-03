<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //

    public function login(Request $r){

        // dd($r);

        // dd('echcke');

        // dd($r);

        $cred=$r->validate(['email'=>'required|email','password'=>'required']);

        $remember=$r->has('remember');

        if(Auth::attempt($cred,$remember)){

            $r->session()->regenerate();
            return redirect('/');


        }else{

            return back()->with('error','credentials are not right');
        }
    }



    public function logout(){

        Auth::logout();

        return redirect('/');
    }
}
