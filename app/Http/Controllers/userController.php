<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class userController extends Controller
{
    function register(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|unique:users|max:255|email:rfc,dns',
            'password' => 'required|max:20|min:3|confirmed',
        ]);
    
        $user=new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=\Hash::make($request->password);
        $user->remember_token=\Str::random(64);
        $user->role_id=1;
        $user->save();
        return redirect('SkillsHub/login');
    }
    function login(REQUEST $request)
    {
        $user=User::get();
        $validatedData = $request->validate([
            'email' => ['required', 'max:255',"email:rfc"], //,dns
            'password' => ['required','min:6'],
        ]);

        $cred=["email"=>$request->email,'password'=>$request->password] ;

        if ( Auth::attempt($cred)) {
           return redirect('/SkillsHub/home');
        }
        return redirect('/SkillsHub/register');
    }
    function logout()
    {   
        
        Auth::logout();
        return redirect('/SkillsHub/register');
    }


}
