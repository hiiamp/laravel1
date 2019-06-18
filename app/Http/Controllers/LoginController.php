<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // for login service
    public function login() {
        return view('home.login');
    }
    public function postLogin(Request $request) {
        $this->validate($request,
            [
                'email'=>'required|email',
                'password'=>'required'
            ],
            [
                //'email.required'=>'Please input your email'
            ]
        );
        $credentials = array('email'=>$request->email,'password'=>$request->password);
        if(Auth::attempt($credentials)) {
            return redirect()->back()->with(['flag'=>'success','infor'=>'Login successfully!']);
        } else {
            return redirect()->back()->with(['flag'=>'danger','infor'=>'Login error!']);
        }
    }
    public function register() {
        return view('home.register');
    }
    public function postRegister(Request $request) {
        session(['name'=>$request->name,'email'=>$request->email,
            'phone'=>$request->phone,'address'=>$request->address]);
        $this->validate($request,
            [
                'email'=>'required|email|unique:users,email',
                'password'=>'required|min:6|max:20|',
                'phone'=>'numeric',
                'name'=>'required',
                'password_confirm'=>'required|same:password'
            ],
            [
                'phone.numeric'=>'Invalid phone number'
            ]
        );
        $user = new User();
        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->address  = $request->address;
        $user->password = Hash::make($request->password);
        $user->phone    = $request->phone;
        $user->save();
        return redirect()->back()->with('Success','Register successfully!');
    }
    public function logout() {
        Auth::logout();
        return redirect()->route('home');
    }
}
