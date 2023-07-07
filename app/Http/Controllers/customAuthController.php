<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use Hash;
use put;
use Auth;


class customAuthController extends Controller
{
    public function login(){
        return view("auth.Login");
    }
    public function registration(){
        return view("auth.registration");
    }
    public function registerUser(Request $request){
        // echo "data register";
        $request->validate([
            'name' =>'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:3|max:12',
        ]);
       $user = new User();
       $user->name = $request->name;
       $user->email = $request->email;
       $user->password =bcrypt($request->password);
       $res = $user->save();
       if($res){
         return back()->with('success',"You have register successfully");
       }
       else{
           return back()->with('fail',"something wrong");
       }
    }
    public function loginUser(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:3|max:12',
        ]);
        $user = User::where('email', $request->email)->first();

        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $request->session()->put('loggedId', $user->id);
                return redirect('/dashboard');
            } else {
                return back()->with('fail', 'The password is not matched');
            }
        } else {
            return back()->with('fail', 'The email id is not registered');
        }
    }
    
    public function dashboard()
    {
       return view('auth.dashboard');
    }

     public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->flush();

        return redirect('/login');
    }
};
